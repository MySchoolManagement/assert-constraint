<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is an email address (using input_filter/FILTER_VALIDATE_EMAIL).
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllEmail extends AbstractAssertionConstraint
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
        return 'allEmail';
    }
}
