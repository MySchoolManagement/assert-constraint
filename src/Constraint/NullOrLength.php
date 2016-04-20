<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that string has a given length.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrLength extends AbstractAssertionConstraint
{

    public $length;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('length', 'message');
    }
}
