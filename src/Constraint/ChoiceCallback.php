<?php

declare(strict_types=1);

namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is in array of choices coming from a callback function.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class ChoiceCallback extends AbstractAssertionConstraint
{
    public $class;
    public $method;
    public $constant;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('class', 'method', 'constant', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'choiceCallback';
    }
}
