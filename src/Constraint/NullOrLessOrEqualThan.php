<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Determines if the value is less or than given limit.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrLessOrEqualThan extends AbstractAssertionConstraint
{

    public $limit;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('limit', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'lessOrEqualThan';
    }
}
