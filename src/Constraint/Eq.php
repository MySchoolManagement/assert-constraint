<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that two values are equal (using == ).
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Eq extends AbstractAssertionConstraint
{

    public $value2;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('value2', 'message');
    }
}
