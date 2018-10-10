<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that a constant is defined.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Defined extends AbstractAssertionConstraint
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
        return 'defined';
    }
}
