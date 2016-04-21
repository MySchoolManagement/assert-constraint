<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that string starts with a sequence of chars.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrStartsWith extends AbstractAssertionConstraint
{

    public $needle;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('needle', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'startsWith';
    }
}
