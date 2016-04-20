<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is an array or an array-accessible object.
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrIsArrayAccessible extends AbstractAssertionConstraint
{

    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('message');
    }
}
