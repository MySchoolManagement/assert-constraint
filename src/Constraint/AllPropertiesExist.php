<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that the value is an object or class, and that the properties all exist.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllPropertiesExist extends AbstractAssertionConstraint
{

    public $properties;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('properties', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'allPropertiesExist';
    }
}
