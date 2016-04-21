<?php
namespace AssertionConstraint;

use Symfony\Component\Validator\Constraint as AbstractConstraint;

abstract class AbstractAssertionConstraint extends AbstractConstraint
{

    /**
     * Names of the properties on the assertion constraint class that should be passed to the assertion function.
     *
     * @return string[]
     */
    public function getAssertionParameterNames()
    {
        return array();
    }

    /**
     * Name of the method to call on the assertion class.
     *
     * @return string
     */
    public abstract function getAssertionMethodName();

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return AssertionValidator::class;
    }
}
