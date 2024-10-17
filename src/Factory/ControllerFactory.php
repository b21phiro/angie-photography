<?php

namespace Phro\Web\Factory;

use Phro\Web\Exception\ControllerFactoryException;

class ControllerFactory
{
    /**
     * @throws ControllerFactoryException
     */
    public static function create(string $className, string $method): \Closure
    {
        if (!class_exists($className))
        {
            throw new ControllerFactoryException("Class $className does not exist");
        }

        $controller = new $className();

        if (!method_exists($controller, $method))
        {
            throw new ControllerFactoryException
            (
                "The method \"$method\" does not exist within \"$className\""
            );
        }

        return fn(...$args) => $controller->$method(...$args);

    }
}