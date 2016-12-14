<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that a number is smaller as a given limit
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Max extends AbstractAssertionConstraint
{

    public $maxValue;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('maxValue', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'max';
    }
}
