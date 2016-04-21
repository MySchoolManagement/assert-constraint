<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that two values are not the same (using === ).
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NotSame extends AbstractAssertionConstraint
{

    public $value2;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('value2', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'notSame';
    }
}
