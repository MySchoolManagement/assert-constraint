<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is numeric.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Numeric extends AbstractAssertionConstraint
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
        return 'numeric';
    }
}
