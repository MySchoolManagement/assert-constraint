<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is not in array of choices.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrNotInArray extends AbstractAssertionConstraint
{

    public $choices;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('choices', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'nullOrNotInArray';
    }
}
