#!/usr/bin/php
<?php
if ($argc !== 5) {
    echo("Usage: generate-constraints.php <path-to-class-file> <fqdn class> <output-namespace> <directory-to-output-classes>\n");
    exit(1);
}

$file = $argv[1];
$class = $argv[2];
$outputNamespace = $argv[3];
$outputDirectory = $argv[4];

require(__DIR__ . '/../../../autoload.php');
require($file);

$assertionTemplate = <<<TEMPLATE
<?php
namespace {{ namespace }};

use AssertionConstraint\AbstractAssertionConstraint;
use Attribute;

/**
 * {{ comment }}
 */
 
#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class {{ name }} extends AbstractAssertionConstraint
{
{{ members }}

{{ constructor }}
{{ methods }}
}

TEMPLATE;

$assertionMethodNameTemplate = <<<TEMPLATE
    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return '{{ name }}';
    }
TEMPLATE;

$parameterNameMethodTemplate = <<<TEMPLATE
    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array({{ names }});
    }
TEMPLATE;

$ignoredMethods = [
    '__callStatic',
];

$rewrittenAssertionNames = [
    'boolean' => 'IsBoolean',
    'false' => 'IsFalse',
    'float' => 'IsFloat',
    'integer' => 'IsInteger',
    'null' => 'IsNull',
    'true' => 'IsTrue',
    'string' => 'IsString',
];

$reflClass = new ReflectionClass($class);

foreach ($reflClass->getMethods() as $method) {
    if (isMethodIgnored($method) === true) {
        continue;
    }

    $assertionName = buildAssertionName($method);
    $constraintProperties = buildConstraintPropertyList($method);
    $constructor = buildConstructor($method);
    $members = buildMembers($method);

    writeConstraintFile($assertionName, $constraintProperties, $method, $method->getName(), $constructor, $members, $outputDirectory, $assertionTemplate);
    writeConstraintFile('nullOr' . ucwords($assertionName), $constraintProperties, $method, 'nullOr' . ucwords($method->getName()), $constructor, $members, $outputDirectory, $assertionTemplate);
    writeConstraintFile('all' . ucwords($assertionName), $constraintProperties, $method, 'all' . ucwords($method->getName()), $constructor, $members, $outputDirectory, $assertionTemplate);
}

function isMethodIgnored(ReflectionMethod $method)
{
    global $ignoredMethods;

    $methodName = $method->getName();

    if (($method->isPublic() === false) || (in_array($methodName, $ignoredMethods) === true)) {
        return true;
    }

    return false;
}

function buildAssertionName(ReflectionMethod $method)
{
    global $rewrittenAssertionNames;

    $assertionName = $method->getName();

    // the name of some assertions are reserved as class names by PHP7
    if (array_key_exists($assertionName, $rewrittenAssertionNames) === true) {
        $assertionName = $rewrittenAssertionNames[$assertionName];
    }

    return $assertionName;
}

function buildConstraintPropertyList(ReflectionMethod $method)
{
    $properties = [];
    $parameterList = $method->getParameters();

    // first parameter is provided by the constraints framework
    array_shift($parameterList);

    foreach ($parameterList as $parameter) {
        $properties[] = $parameter;
    }

    return $properties;
}

function buildConstructor(ReflectionMethod $method): string
{
    $properties = [];
    $assign = [];
    $parameterList = $method->getParameters();

    // `value` is provided at runtime.
    array_shift($parameterList);

    foreach ($parameterList as $parameter) {
        $type = null;
        $name = $parameter->getName();
        $defaultValue = $parameter->isOptional() ? var_export($parameter->getDefaultValue(), true) : null;

        if ($parameter->getType()) {
            $type = sprintf('%s%s',
                $parameter->isOptional() ? '?' : '',
                $parameter->getType()->getName()
            );
        }

        $str = sprintf('%s $%s %s,',
            $type,
            $name,
            $defaultValue ? ' = ' . $defaultValue : '',
        );

        $properties[] = '    ' .trim($str);
        $assign[] = sprintf('    $this->%1$s = $%1$s;', $name );
    }

    $template = <<<EOF
public function __construct(
%s
    mixed \$options = null,
    ?array \$groups = null,
    mixed \$payload = null
)
{
%s

    parent::__construct(\$options, \$groups, \$payload);
}
EOF;

    $propertyStr = join("\n", $properties);
    $assignStr = join("\n", $assign);

    return sprintf($template, $propertyStr, $assignStr);
}

function buildMembers(ReflectionMethod $method): string
{
    $properties = [];
    $parameterList = $method->getParameters();

    // `value` is provided at runtime.
    array_shift($parameterList);

    foreach ($parameterList as $parameter) {
        $type = null;
        $name = $parameter->getName();
        $defaultValue = null;

        if ($parameter->getType()) {
            $type = sprintf('%s%s',
                $parameter->isOptional() ? '?' : '',
                $parameter->getType()?->getName()
            );
        }

        $properties[] = sprintf('public %s $%s %s;',
            $type,
            $name,
            $defaultValue ? ' = ' . $defaultValue : '',
        );
    }

    return join("\n", $properties);
}

function writeConstraintFile($assertionName, array $constraintProperties, ReflectionMethod $method, string $methodName, string $constructor, string $members, $outputDirectory, $template)
{
    global $parameterNameMethodTemplate, $assertionMethodNameTemplate, $outputNamespace;

    $templateMethods = [];
    $parameterNames = [];

    foreach ($constraintProperties as $property) {
        $parameterNames[] = sprintf("'%s'", $property->getName());
    }

    if (sizeof($parameterNames) > 0) {
        $tokens = [
            '{{ names }}' => join(', ', $parameterNames),
        ];

        $templateMethods[] = str_replace(array_keys($tokens), array_values($tokens), $parameterNameMethodTemplate);
    }

    $templateMethods[] = str_replace('{{ name }}', $methodName, $assertionMethodNameTemplate);

    $assertionName = ucwords($assertionName);
    $tokens = [
        '{{ comment }}' => naivelyExtractComment($method->getDocComment()),
        '{{ methods }}' => sizeof($templateMethods) ? "\n" . join("\n\n", $templateMethods) : '',
        '{{ name }}' => $assertionName,
        '{{ namespace }}' => $outputNamespace,
        '{{ members }}' => $members,
        '{{ constructor }}' => $constructor,
    ];
    $outputPath = $outputDirectory . '/' . $assertionName . '.php';

    echo ("Writing " . $outputPath . "\n");

    $file = fopen($outputPath, 'w');
    fputs($file, str_replace(array_keys($tokens), array_values($tokens), $template));
    fclose($file);
}

function naivelyExtractComment($block)
{
    $lines = explode("\n", $block);
    $commentLines = [];

    // remove the opening /**
    array_shift($lines);

    // scan until a blank line or the end
    foreach ($lines as $line) {
        $line = trim(substr(trim($line), 1));

        if ((strlen($line) === 0) || ($line === '*/')) {
            break;
        } else {
            $commentLines[] = $line;
        }
    }

    return join(' ', $commentLines);
}
