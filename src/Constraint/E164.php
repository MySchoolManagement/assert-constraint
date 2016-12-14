<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that the given string is a valid E164 Phone Number
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class E164 extends AbstractAssertionConstraint
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
        return 'e164';
    }
}
