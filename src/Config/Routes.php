<?php

use Phro\Web\Controller\AdminController;
use Phro\Web\Controller\ApiController;
use Phro\Web\Controller\LoginController;
use Phro\Web\Controller\WebController;
use Phro\Web\Core\Route;

$this->routes = [

    // API
      new Route("GET", "/api", [ApiController::class, 'helloWorld'])
    , new Route("POST", "/api/user", [ApiController::class, 'createUser'])
    , new Route("DELETE", "/api/user", [ApiController::class, 'deleteUser'])

    // Admin
    , new Route("GET", "/admin", [AdminController::class, 'dashboard'])

    // Login
    , new Route("GET", "/login", [LoginController::class, 'login'])
    , new Route("POST", "/login/authenticate", [LoginController::class, 'authenticate'])

    // Web
    , new Route("GET", "/", [WebController::class, 'sendHtmlFile'])

];