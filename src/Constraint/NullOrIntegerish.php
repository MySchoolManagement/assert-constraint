<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is a php integer'ish. @param mixed $value @param string|null $message @param string|null $propertyPath @return void @throws \Assert\AssertionFailedException /
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrIntegerish extends AbstractAssertionConstraint
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
        return 'nullOrIntegerish';
    }
}
