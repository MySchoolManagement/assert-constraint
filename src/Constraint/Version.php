<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert comparison of two versions.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Version extends AbstractAssertionConstraint
{

    public $operator;
    public $version2;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('operator', 'version2', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'version';
    }
}
