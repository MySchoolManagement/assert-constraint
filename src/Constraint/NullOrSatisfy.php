<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that the provided value is valid according to a callback.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrSatisfy extends AbstractAssertionConstraint
{

    public $callback;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('callback', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'nullOrSatisfy';
    }
}
