<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that a value is greater or equal than a lower limit, and less than or equal to an upper limit.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Between extends AbstractAssertionConstraint
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
        return 'between';
    }
}
