<?php

namespace App\Exceptions;

use Exception;
use ReflectionClass;
use ReflectionException;

class RequiredPropertyException extends Exception
{

    /**
     * @throws ReflectionException
     */
    public function __construct(string $parameterClass, string $parameterName, string $className)
    {
        $test = (new ReflectionClass($className))->getName();
        parent::__construct("Parameter [$parameterName of type $parameterClass] is required in class $test");
    }
}
