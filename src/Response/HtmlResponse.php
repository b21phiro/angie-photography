<?php

namespace Phro\Web\Response;

use GuzzleHttp\Psr7\Response;
use Phro\Web\Exception\HtmlResponseException;

class HtmlResponse extends Response
{

    /**
     * @throws HtmlResponseException
     */
    public function __construct(int $status, string $filename, $headers = [])
    {

        if (!file_exists($filename))
        {
            throw new HtmlResponseException();
        }

        $body = file_get_contents($filename);

        $headers["Content-Type"] = "text/html";

        parent::__construct
        (
            $status,
            $headers,
            $body
        );
    }

}