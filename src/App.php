<?php

namespace Angie\Web;

class App {

    public Router $router;

    public function __construct() {
        $this->router = new Router();
    }

    public function run(): void {
        $this->router->handler();
    }

}