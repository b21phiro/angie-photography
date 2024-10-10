<?php

namespace Angie\Web\Http;

class Get extends Route {

    public function __construct(string $path, mixed $action) {
        parent::__construct("GET", $path, $action);
    }

}