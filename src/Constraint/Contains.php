<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that string contains a sequence of chars.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Contains extends AbstractAssertionConstraint
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
        return 'contains';
    }
}
