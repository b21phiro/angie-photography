<?php

namespace Phro\Web\Response;

use GuzzleHttp\Psr7\Response;

class JsonResponse extends Response
{
    public function __construct(int $status, array $body, array $headers = [])
    {
        $json = json_encode($body);
        $headers["Content-Type"] = "application/json";
        parent::__construct($status, $headers, $json);
    }

}
