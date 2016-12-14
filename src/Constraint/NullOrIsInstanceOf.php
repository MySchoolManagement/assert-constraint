<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is instance of given class-name.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrIsInstanceOf extends AbstractAssertionConstraint
{

    public $className;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('className', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'nullOrIsInstanceOf';
    }
}
