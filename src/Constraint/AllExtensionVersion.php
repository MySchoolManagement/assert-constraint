<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that extension is loaded and a specific version is installed.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllExtensionVersion extends AbstractAssertionConstraint
{

    public $operator;
    public $version;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('operator', 'version', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'allExtensionVersion';
    }
}
