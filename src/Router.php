<?php

namespace Angie\Web;

use Angie\Web\Controller\ApiController;
use Angie\Web\Controller\HomeController;
use Angie\Web\Http\Get;
use GuzzleHttp\Psr7\ServerRequest;
use JetBrains\PhpStorm\NoReturn;

class Router {

    private array $routes;

    public function __construct() {
        $this->routes = [

            // API
            new Get("/api/hello", [ApiController::class, "hello"]),

            // Website
            new Get("/*", [HomeController::class, "index"]),

        ];
    }

    public function handler(): void {

        $request = ServerRequest::fromGlobals();

        $route = array_values(
            array_filter($this->routes, fn($route): bool => $route->match($request))
        )[0] ?? null;

        if (!$route) {
            $this->notFound();
        }

        // Execute handler
        call_user_func($route->action);

    }

    #[NoReturn]
    public function notFound(): void {
        http_response_code(404);
        exit();
    }

}