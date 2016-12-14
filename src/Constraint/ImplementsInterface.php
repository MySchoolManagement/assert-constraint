<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that the class implements the interface
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class ImplementsInterface extends AbstractAssertionConstraint
{

    public $interfaceName;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('interfaceName', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'implementsInterface';
    }
}
