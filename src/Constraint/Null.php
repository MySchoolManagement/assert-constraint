<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is null
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Null extends AbstractAssertionConstraint
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
        return 'null';
    }
}