<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value matches a regex
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Regex extends AbstractAssertionConstraint
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
        return 'regex';
    }
}
