<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that key exists in an array.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrKeyExists extends AbstractAssertionConstraint
{

    public $key;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('key', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'nullOrKeyExists';
    }
}
