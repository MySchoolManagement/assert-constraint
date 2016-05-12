<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Alias of {@see choice()}
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllInArray extends AbstractAssertionConstraint
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
        return 'allInArray';
    }
}