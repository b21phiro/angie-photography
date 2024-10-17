<?php

namespace Phro\Web\Psr7;

use Psr\Http\Message\ServerRequestInterface;

class ServerRequest extends \GuzzleHttp\Psr7\ServerRequest
{

    public static function createFromGlobals(string $baseRoute): ServerRequestInterface
    {
        $request = parent::fromGlobals();
        $pattern = '/^'.preg_quote($baseRoute, '/').'/';
        $path = preg_replace($pattern, '', $request->getUri()->getPath());
        return $request->withUri
        (
            $request
                ->getUri()
                ->withPath($path)
        );
    }

}