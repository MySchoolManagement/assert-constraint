<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that the given string is a valid json string.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrIsJsonString extends AbstractAssertionConstraint
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
        return 'nullOrIsJsonString';
    }
}
