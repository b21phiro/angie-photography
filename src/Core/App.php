<?php

namespace Phro\Web\Core;

use Psr\Http\Message\ServerRequestInterface;

class App {

    protected Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run(ServerRequestInterface $request): void
    {
        $this->router->handler($request);
    }

}