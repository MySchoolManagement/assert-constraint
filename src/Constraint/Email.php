<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is an email adress (using input_filter/FILTER_VALIDATE_EMAIL).
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Email extends AbstractAssertionConstraint
{

    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('message');
    }
}
