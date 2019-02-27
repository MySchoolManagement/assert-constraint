<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is in array of choices.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllChoice extends AbstractAssertionConstraint
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
        return 'allChoice';
    }
}
