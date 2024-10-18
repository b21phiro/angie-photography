<?php

namespace Phro\Web\Config;

use HttpSoft\Router\RouteCollector;
use Phro\Web\Controller\AdminController;
use Phro\Web\Controller\ApiController;
use Phro\Web\Controller\WebController;
use Phro\Web\Exception\ControllerFactoryException;
use Phro\Web\Factory\ControllerFactory;

try
{

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
    $router->get
    (
        "admin",
        "/admin",
        ControllerFactory::create(AdminController::class, "dashboard")
    );

    $router->get
    (
        "admin.login",
        "/admin/login",
        ControllerFactory::create(AdminController::class, "login")
    );

} catch (ControllerFactoryException $exception)
{
    echo "<h1>Error {$exception->getCode()}</h1>";
    echo "<p><b>Message: {$exception->getMessage()}</b></p>";
    echo "<p>File: {$exception->getFile()}</p>";
    echo "<p>At line: {$exception->getLine()}</p>";
    echo "<pre>{$exception->getTraceAsString()}</pre>";
    exit();
}