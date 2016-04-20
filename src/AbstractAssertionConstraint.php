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
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return AssertionValidator::class;
    }
}
