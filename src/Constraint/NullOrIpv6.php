<?php
namespace AssertionConstraintConstraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is an IPv6 address (using input_filter/FILTER_VALIDATE_IP).
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class NullOrIpv6 extends AbstractAssertionConstraint
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
        return 'nullOrIpv6';
    }
}
