<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert on PHP version.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class PhpVersion extends AbstractAssertionConstraint
{

    public $version;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('version', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'phpVersion';
    }
}
