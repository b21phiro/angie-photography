<?php

namespace Angie\Web;

use Psr\Http\Message\ServerRequestInterface;

class App {

    public Router $router;

    public function __construct() {
        $this->router = new Router();
    }

    public function run(ServerRequestInterface $request): void {

    }

}