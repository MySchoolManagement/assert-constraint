<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that a value is greater than a lower limit, and less than an upper limit.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrBetweenExclusive extends AbstractAssertionConstraint
{

    public $lowerLimit;
    public $upperLimit;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('lowerLimit', 'upperLimit', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'nullOrBetweenExclusive';
    }
}
