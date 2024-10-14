<?php

namespace Phro\Web\Controller;

class ApiController
{

    public function helloWorld(): void
    {
        print_r(json_encode(["code" => 200, "message" => "Hello world!"]));
    }

}