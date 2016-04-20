<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that two values are the same (using ===).
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrSame extends AbstractAssertionConstraint
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
}
