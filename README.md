# [Assert](https://github.com/beberlei/assert) bridge for Symfony

[![Latest Stable Version](https://poser.pugx.org/myschoolmanagement/assert-constraint/v/stable)](https://packagist.org/packages/myschoolmanagement/symfony-rested-bundle) [![Total Downloads](https://poser.pugx.org/myschoolmanagement/symfony-rested-bundle/downloads)](https://packagist.org/packages/myschoolmanagement/symfony-rested-bundle) [![Latest Unstable Version](https://poser.pugx.org/myschoolmanagement/assert-constraint/v/unstable)](https://packagist.org/packages/myschoolmanagement/assert-constraint) [![License](https://poser.pugx.org/myschoolmanagement/assert-constraint/license)](https://packagist.org/packages/myschoolmanagement/assert-constraint)

This is a simple bridge for using [beberlei/assert](https://github.com/beberlei/assert) assertions as constraints for the [Symfony Validator](https://github.com/symfony/validator) component.

# Installation
Using Composer:
```sh
composer require myschoolmanagement/assert-constraint
```

# Configuration

If you are using your own ``Assertion`` class or your own ``Exception`` class then you must configure these by setting ``AssertionConstraint\AssertionValidator::$assertClass`` and ``AssertionConstraint\AssertionValidator::$assertExceptionClass``. These are both static properties.

# Generating new constraints

There is a helper for generating the constraint classes in ``bin``. This is also copied to ``vendor/bin``.

### Prototype
```sh
Usage: generate-constraints.php <path-to-class-file> <fqdn class> <output-namespace> <directory-to-output-classes>
```

### Example Usage:

```sh
php vendor/bin/generate-constraints.php vendor/beberlei/assert/lib/Assert/Assertion.php Assert\\Assertion MyBundle\\Constraint src/MyBundle/Constraint
```
This will detect all the assertions on the ``Assert\Assertion`` class and output constraint files in ``src/MyBundle/Constraint`` in the ``MyBundle\Constraint`` namespace.

The generator will give best effort to detect the assertion parameters and add those to the constraint class so they can be configured through the annotation.
