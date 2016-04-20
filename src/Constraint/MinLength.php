<?php
namespace AssertionConstraint\Constraint;

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
}
