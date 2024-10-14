<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();

$request = \Angie\Web\Psr7\Request::fromGlobals();

$app = new \Angie\Web\App();
$app->run($request);