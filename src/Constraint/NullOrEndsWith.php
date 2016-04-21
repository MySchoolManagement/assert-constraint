<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that string ends with a sequence of chars.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrEndsWith extends AbstractAssertionConstraint
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
        return 'endsWith';
    }
}
