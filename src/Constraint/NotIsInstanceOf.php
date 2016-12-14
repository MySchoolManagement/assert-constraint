<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is not instance of given class-name.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NotIsInstanceOf extends AbstractAssertionConstraint
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
        return 'notIsInstanceOf';
    }
}
