<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Determines if the value is greater than given limit.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrGreaterThan extends AbstractAssertionConstraint
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
        return 'greaterThan';
    }
}
