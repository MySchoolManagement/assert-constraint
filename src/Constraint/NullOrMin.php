<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that a value is at least as big as a given limit
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrMin extends AbstractAssertionConstraint
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
        return 'nullOrMin';
    }
}
