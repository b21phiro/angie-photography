<?php

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();

$request = \Phro\Web\Psr7\Request::fromGlobals();

$app = new \Phro\Web\Core\App();
$app->run($request);