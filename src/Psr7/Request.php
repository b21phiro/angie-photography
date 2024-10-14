<?php

namespace Phro\Web\Psr7;

use GuzzleHttp\Psr7\ServerRequest;
use Phro\Web\Config\Env;
use Psr\Http\Message\ServerRequestInterface;

class Request extends ServerRequest {

    public static function fromGlobals(): ServerRequestInterface
    {
        $request = parent::fromGlobals();
        $path = $request->getUri()->getPath();
        $pathWithoutBaseRoute = preg_replace(
            '/^('.preg_quote(Env::BaseRoute(), '/').')/',
            '',
            $path
        );
        return $request->withUri($request->getUri()->withPath($pathWithoutBaseRoute));
    }

}