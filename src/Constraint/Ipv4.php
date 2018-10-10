<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is an IPv4 address (using input_filter/FILTER_VALIDATE_IP).
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class Ipv4 extends AbstractAssertionConstraint
{

    public $flag;
    public $message;

    /**
     * {@inheritdoc}
     */
    public function getAssertionParameterNames()
    {
        return array('flag', 'message');
    }

    /**
     * {@inheritdoc}
     */
    public function getAssertionMethodName()
    {
        return 'ipv4';
    }
}
