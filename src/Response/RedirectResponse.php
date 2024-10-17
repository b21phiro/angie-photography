<?php

namespace Phro\Web\Response;

use GuzzleHttp\Psr7\Response;

class RedirectResponse extends Response
{
    public function __construct(string $path)
    {
        parent::__construct
        (
            302,
            [
                "Location" => $path
            ],
        );
    }

}
