<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that a value is at least as big as a given limit.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllMin extends AbstractAssertionConstraint
{

    public $minValue;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('minValue', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'allMin';
    }
}
