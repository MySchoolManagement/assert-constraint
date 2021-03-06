<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that a number is smaller as a given limit.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrMax extends AbstractAssertionConstraint
{

    public $maxValue;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('maxValue', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'nullOrMax';
    }
}
