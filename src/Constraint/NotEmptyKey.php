<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that key exists in an array/array-accessible object and it's value is not empty.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NotEmptyKey extends AbstractAssertionConstraint
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
}
