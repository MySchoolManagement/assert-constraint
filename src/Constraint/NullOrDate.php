<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that date is valid and corresponds to the given format.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrDate extends AbstractAssertionConstraint
{

    public $format;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('format', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'nullOrDate';
    }
}
