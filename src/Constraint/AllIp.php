<?php
namespace AssertionConstraint\Constraint;

use AssertionConstraint\AbstractAssertionConstraint;

/**
 * Assert that value is an IPv4 or IPv6 address (using input_filter/FILTER_VALIDATE_IP).
 *
 * @Annotation
 * @Target({"PROPERTY"})
 */
class AllIp extends AbstractAssertionConstraint
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
        return 'allIp';
    }
}
