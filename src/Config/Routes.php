<?php

$this->routes = [

    // API
    new \Phro\Web\Core\Route("GET", "/api", [\Phro\Web\Controller\ApiController::class, 'helloWorld']),

    // Admin
    new \Phro\Web\Core\Route("GET", "/admin", [\Phro\Web\Controller\AdminController::class, 'dashboard']),

    // Web
    new \Phro\Web\Core\Route("GET", "/(.*)", [\Phro\Web\Controller\WebController::class, 'sendHtmlFile'])

];