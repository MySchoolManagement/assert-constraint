<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Determines if the value is less than given limit.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrLessThan extends AbstractAssertionConstraint
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
