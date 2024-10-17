<?php

namespace Phro\Web\Response;

use GuzzleHttp\Psr7\Response;
use Phro\Web\Exception\ViewResponseException;

class ViewResponse extends Response
{
    /**
     * @throws ViewResponseException
     */
    public function __construct(string $path, int $status = 200)
    {

        $filepath = __DIR__ . '/../View/'.$path;

        if (!file_exists($filepath))
        {
            throw new ViewResponseException();
        }

        ob_start();
        include $filepath;
        $body = ob_get_clean();

        parent::__construct($status, [], $body);
    }
}