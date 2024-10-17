<?php

namespace Phro\Web\Config;

use HttpSoft\Router\RouteCollector;
use Phro\Web\Controller\ApiController;
use Phro\Web\Controller\WebController;
use Phro\Web\Factory\ControllerFactory;

/** @var RouteCollector $router */
$router = ($router ?? null);

// Matches anything except for Admin or API routes.
$router->get
(
    "web",
    "^(?!\/api|\/admin).*$",
    ControllerFactory::create(WebController::class, "htmlResponseAction")
);

// API Routes
$router->get(
    "api",
    "/api",
    ControllerFactory::create(ApiController::class, "hello")
);

// Admin Routes