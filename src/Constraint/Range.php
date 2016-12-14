<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is in range of numbers.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Range extends AbstractAssertionConstraint
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
        return 'range';
    }
}
