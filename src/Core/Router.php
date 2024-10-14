<?php

namespace Phro\Web\Core;

use JetBrains\PhpStorm\NoReturn;
use Psr\Http\Message\ServerRequestInterface;

class Router
{

    protected array $routes;

    public function __construct()
    {
        require __DIR__ . "/../Config/Routes.php";
    }

    public function handler(ServerRequestInterface $request): void
    {
        $route = $this->findRoute($request);

        if (!$route)
        {
            $this->notFound();
        }
        else
        {
            $route->handler();
        }

    }

    public function notFound(): void
    {
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
    }

    public function findRoute(ServerRequestInterface $request): Route | null
    {
        return array_values(
            array_filter(
                $this->routes,
                fn ($route) => $route->match($request)
            )
        )[0] ?? null;
    }

}