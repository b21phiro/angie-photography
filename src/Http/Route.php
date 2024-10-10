<?php

namespace Angie\Web\Http;

use Angie\Web\Utility\Config;
use Exception;
use GuzzleHttp\Psr7\Request;
use JetBrains\PhpStorm\NoReturn;

class Route {

    public string $method;
    public string $path;
    public mixed $action;

    public function __construct(string $method, string $path, mixed $action) {

        $this->method = $method;
        $this->path = Config::BASE_ROOT().preg_replace('/\*/i', '.*', $path);

        $className = (isset($action[0])) ? $action[0] : null;

        try {

            if (!class_exists($className)) {
                throw new Exception("Class {$className} does not exist");
            }

            $controller = new $className();
            $controllerMethod = (isset($action[1])) ? $action[1] : null;

            if (!method_exists($controller, $controllerMethod)) {
                throw new Exception("Method {$controllerMethod} does not exist");
            }

        } catch (Exception $exception) {
            $this->handleException($exception);
        }

        $this->action = fn() => $controller->$controllerMethod();

    }

    public function match(Request $request): bool {

        if ($request->getMethod() !== $this->method) {
            return false;
        }

        $pattern = "#^(".$this->path.")#";

        if (!preg_match($pattern, $request->getUri()->getPath())) {
            return false;
        }

        return true;
    }

    #[NoReturn]
    private function handleException(Exception $exception): void {
        echo $exception->getCode();
        echo $exception->getFile()." at line ".$exception->getLine();
        echo $exception->getMessage();
        echo $exception->getTraceAsString();
        exit();
    }

}