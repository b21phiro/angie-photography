<?php

namespace Phro\Web\Core;

use Psr\Http\Message\ServerRequestInterface;

class App {

    public function __construct() {}

    public function run(ServerRequestInterface $request): void
    {
        var_dump($request->getUri()->getPath());
    }

}