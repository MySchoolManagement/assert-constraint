<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is in range of numbers.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllRange extends AbstractAssertionConstraint
{

    public $minValue;
    public $maxValue;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('minValue', 'maxValue', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'allRange';
    }
}
