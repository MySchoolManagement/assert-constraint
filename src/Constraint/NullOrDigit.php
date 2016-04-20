<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Validates if an integer or integerish is a digit.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrDigit extends AbstractAssertionConstraint
{

    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('message');
    }
}
