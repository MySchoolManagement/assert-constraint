<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that string value is not longer than $maxLength chars.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class MaxLength extends AbstractAssertionConstraint
{

    public $maxLength;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('maxLength', 'message');
    }
}
