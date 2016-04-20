<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Determines if the value is greater or equal than given limit.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrGreaterOrEqualThan extends AbstractAssertionConstraint
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
}
