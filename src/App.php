<?php

namespace Phro\Web;

use GuzzleHttp\Psr7\Response;
use HttpSoft\Emitter\SapiEmitter;
use HttpSoft\Router\RouteCollector;
use Phro\Web\Exception\HtmlResponseException;
use Phro\Web\Exception\RouterException;
use Psr\Http\Message\ServerRequestInterface;

class App
{
    private RouteCollector $router;
    private SapiEmitter $emitter;

    public function __construct() {
        $router = new RouteCollector();
        require __DIR__ . '/Config/Web.php';
        $this->router = $router;

        $this->emitter = new SapiEmitter();
    }

    public function run(ServerRequestInterface $request): void
    {
        $route = $this->router->routes()->match($request);

        try
        {

            if (!$route) {
                throw new RouterException();
            }

            $response = call_user_func($route->getHandler(), $route->getMatchedParameters());

            $this->emitter->emit($response);

        } catch (RouterException $exception)
        {
            echo "<h1>Error {$exception->getCode()}</h1>";
            echo "<p>{$exception->getMessage()}</p>";
            http_response_code($exception->getCode());
        } catch (\TypeError | HtmlResponseException $exception)
        {
            echo "<h1>Error {$exception->getCode()}</h1>";
            echo "<p>File: {$exception->getFile()} at line: {$exception->getLine()}</p>";
            echo "<p>Message: {$exception->getMessage()}</p>";
            echo "<p>Trace: {$exception->getTraceAsString()}</p>";
            http_response_code($exception->getCode());
        }

    }

}