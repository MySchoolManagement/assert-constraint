<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that a string is at least $minLength chars long.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class MinLength extends AbstractAssertionConstraint
{

    public $minLength;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('minLength', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'minLength';
    }
}
