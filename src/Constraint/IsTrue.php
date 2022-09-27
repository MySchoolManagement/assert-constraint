<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that the value is boolean True.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class IsTrue extends AbstractAssertionConstraint
{

    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'true';
    }
}
