<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that key exists in an array/array-accessible object using isset()
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class KeyIsset extends AbstractAssertionConstraint
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
