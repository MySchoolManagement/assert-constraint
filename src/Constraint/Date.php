<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that date is valid and corresponds to the given format.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Date extends AbstractAssertionConstraint
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
        return 'date';
    }
}
