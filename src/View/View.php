<?php

namespace Phro\Web\View;

use Exception;
use GuzzleHttp\Psr7\Response;

class View
{
    /**
     * @throws Exception
     */
    public function routeView(string $filename, array $bag = []): Response
    {

        $filename = __DIR__."/".$filename;

        if (!file_exists($filename))
        {
            throw new Exception("View file $filename does not exist", 404);
        }

        extract($bag);

        ob_clean();
        include __DIR__ . "/template.php";
        $body = ob_get_clean();

        return new Response(200, [], $body);
    }

}