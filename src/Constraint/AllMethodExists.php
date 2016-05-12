<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Determines that the named method is defined in the provided object.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllMethodExists extends AbstractAssertionConstraint
{

    public $object;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('object', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'allMethodExists';
    }
}
