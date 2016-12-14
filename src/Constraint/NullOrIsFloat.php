<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is a php float.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrIsFloat extends AbstractAssertionConstraint
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
        return 'nullOrFloat';
    }
}
