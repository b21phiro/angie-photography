<?php

namespace Angie\Web\Controller;

use GuzzleHttp\Psr7\Response;

class HomeController {

    public function index(): void {

        ob_start();
        include __DIR__ . "/../../public/index.html";
        $html = ob_get_clean();

        $response = new Response(200, [], $html);
        $body = $response->getBody();

        if (!$body->isReadable()) {
            return;
        }

        while (!$body->eof()) {
            echo $body->read(1024);
        }

    }

}