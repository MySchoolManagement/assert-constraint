<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that the value is an object or class, and that the property exists.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrPropertyExists extends AbstractAssertionConstraint
{

    public $property;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('property', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'nullOrPropertyExists';
    }
}
