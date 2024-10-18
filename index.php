<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$request = \Phro\Web\Psr7\ServerRequest::createFromGlobals
(
    Phro\Web\Config\Env::BaseRoute()
);

$app = new \Phro\Web\App();
$app->run($request);