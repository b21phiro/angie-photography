<?php

namespace Angie\Web\Controller;

class ApiController {

    public function hello(): void {
        $response = json_encode(["code" => 200, "message" => "Hello World!"]);
        print_r($response);
    }

}