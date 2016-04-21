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

require($file);

$assertionTemplate = <<<TEMPLATE
<?php
namespace {{ namespace }};

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * {{ comment }}
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class {{ name }} extends AbstractAssertionConstraint
{
{{ properties }}
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

$propertyTemplate = <<<TEMPLATE
    public \${{ name }};
TEMPLATE;

$ignoredMethods = [
    '__callStatic',
];

$rewrittenAssertionNames = [
    'boolean' => 'IsBoolean',
    'float' => 'IsFloat',
    'integer' => 'IsInteger',
    'string' => 'IsString',
];

$reflClass = new ReflectionClass($class);

foreach ($reflClass->getMethods() as $method) {
    if (isMethodIgnored($method) === true) {
        continue;
    }

    $assertionName = buildAssertionName($method);
    $constraintProperties = buildConstraintPropertyList($method);

    writeConstraintFile($assertionName, $constraintProperties, $method, $outputDirectory, $assertionTemplate);
    writeConstraintFile('nullOr' . ucwords($assertionName), $constraintProperties, $method, $outputDirectory, $assertionTemplate);
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
    // we're going to make assumptions that every assertion follows the standard prototype of:
    //      function assertion($value, $message = null, $propertyPath = null)
    // and that we'll assume as soon as we hit a $message parameter, everything before is going to affect the
    // behaviour of the assertion and as such needs to be made available for configuration
    $properties = [];
    $parameterList = $method->getParameters();

    // first parameter is provided by the constraints framework
    array_shift($parameterList);

    foreach ($parameterList as $parameter) {
        $properties[] = $parameter;

        if ($parameter->getName() === 'message') {
            break;
        }
    }

    return $properties;
}

function writeConstraintFile($assertionName, array $constraintProperties, ReflectionMethod $method, $outputDirectory, $template)
{
    global $propertyTemplate, $parameterNameMethodTemplate, $parameterNameMethodTemplate, $assertionMethodNameTemplate, $outputNamespace;

    $templateProperties = [];
    $templateMethods = [];
    $parameterNames = [];

    foreach ($constraintProperties as $property) {
        $tokens = [
            '{{ name }}' => $property->getName(),
        ];

        $parameterNames[] = sprintf("'%s'", $property->getName());
        $templateProperties[] = str_replace(array_keys($tokens), array_values($tokens), $propertyTemplate);
    }

    if (sizeof($parameterNames) > 0) {
        $tokens = [
            '{{ names }}' => join(', ', $parameterNames),
        ];

        $templateMethods[] = str_replace(array_keys($tokens), array_values($tokens), $parameterNameMethodTemplate);
    }

    $templateMethods[] = str_replace('{{ name }}', $method->getName(), $assertionMethodNameTemplate);

    $assertionName = ucwords($assertionName);
    $tokens = [
        '{{ comment }}' => naivelyExtractComment($method->getDocComment()),
        '{{ methods }}' => sizeof($templateMethods) ? "\n" . join("\n\n", $templateMethods) : '',
        '{{ name }}' => $assertionName,
        '{{ namespace }}' => $outputNamespace,
        '{{ properties }}' => sizeof($templateProperties) ? "\n" . join("\n", $templateProperties) : '',
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
