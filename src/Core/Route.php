<?php

namespace Phro\Web\Core;

use Exception;
use Psr\Http\Message\ServerRequestInterface;

class Route
{
    private mixed $action;
    public string $path;
    public string $method;

    public function __construct(string $method, string $path, array $action)
    {
        $this->method = $method;
        $this->setPathPattern($path);
        $this->invokeHandler($action);
    }

    public function handler(): void
    {
        call_user_func($this->action);
    }

    public function match(ServerRequestInterface $request): bool
    {

        if ($this->method !== $request->getMethod())
        {
            return false;
        }

        return preg_match
        (
            $this->path,
            $request->getUri()->getPath()
        );

    }

    private function setPathPattern(string $path): void
    {
        $this->path = '/^'.preg_quote($path, '/').'/';
    }

    /**
     * @throws Exception
     */
    private function invokeHandler(array $action): void
    {
        if (!isset($action[0]) || !isset($action[1]))
        {
            throw new Exception("Invalid route action", 500);
        }

        $controllerClassName = $action[0];

        if (!class_exists($controllerClassName))
        {
            throw new Exception("Controller class \"$controllerClassName\" does not exist", 500);
        }

        $controller = new $controllerClassName();

        $method = $action[1];

        if (!method_exists($controller, $method))
        {
            throw new Exception("Given \"$method =\" is not a method in \"$controllerClassName\"", 500);
        }

        $this->action = fn(): mixed => $controller->$method();

    }

}