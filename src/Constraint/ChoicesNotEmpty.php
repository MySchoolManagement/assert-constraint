<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Determines if the values array has every choice as key and that this choice has content.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class ChoicesNotEmpty extends AbstractAssertionConstraint
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
}
