<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that the count of countable is equal to count.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllCount extends AbstractAssertionConstraint
{

    public $count;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('count', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'allCount';
    }
}
