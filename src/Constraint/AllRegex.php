<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value matches a regex.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllRegex extends AbstractAssertionConstraint
{

    public $pattern;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('pattern', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'allRegex';
    }
}
