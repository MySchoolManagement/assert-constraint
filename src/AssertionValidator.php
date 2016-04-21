<?php
namespace AssertionConstraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class AssertionValidator extends ConstraintValidator
{

    /**
     * Class to invoke assertion checks on.
     *
     * @var string
     */
    public static $assertClass = 'Assert\Assertion';

    /**
     * Exception that the assertion checks throw.
     *
     * @var string
     */
    public static $assertExceptionClass = 'Assert\InvalidArgumentException';

    /**
     * {@inheritdoc}
     *
     * @throws UnexpectedTypeException When the constraint isn't a subclass of {@see AbstractAssertionConstraint}
     * @throws ConstraintDefinitionException When the assertion doesn't exist on the assertion class
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof AbstractAssertionConstraint) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__ . '\AbstractAssertionConstraint');
        }

        $methodName = $constraint->getAssertionMethodName();
        $callable = [static::$assertClass, $methodName];
        $override = null;

        if (is_callable($callable) === false) {
            throw new ConstraintDefinitionException('Must be a valid callable on the assertion class');
        }

        $parameters = array($value);

        foreach ($constraint->getAssertionParameterNames() as $name) {
            $parameters[] = $constraint->{$name};
        }

        try {
            call_user_func_array($callable, $parameters);
        } catch (\Exception $e) {
            if ($e instanceof static::$assertExceptionClass) {
                $this->context->buildViolation($e->getMessage())
                    ->setParameter('{{ value }}', $this->formatValue($value))
                    ->setCode($e->getCode())
                    ->addViolation();
            } else {
                throw $e;
            }
        }
    }

    /**
     * @param Constraint $constraint
     * @return string
     */
    private function getAssertionName(Constraint $constraint)
    {
        $components = explode('\\', get_class($constraint));
        $name = $components[sizeof($components) - 1];
        $name[0] = strtolower($name[0]);

        return $name;
    }
}
