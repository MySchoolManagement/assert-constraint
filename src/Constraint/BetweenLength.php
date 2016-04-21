<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that string length is between min,max lengths.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class BetweenLength extends AbstractAssertionConstraint
{

    public $minLength;
    public $maxLength;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('minLength', 'maxLength', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'betweenLength';
    }
}
