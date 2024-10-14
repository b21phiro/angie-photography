<?php

namespace Angie\Web\Psr7;

use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Uri;

class Request extends ServerRequest {

    public static function fromGlobals(): \Psr\Http\Message\ServerRequestInterface {
        $request = parent::fromGlobals();

        $baseRoot = $_ENV['BASE_PATH_ROOT'] ?? "";
        if (!empty($baseRoot)) {
            $path = preg_replace(
                '/^(\\'.preg_quote($baseRoot).')/',
                '',
                $request->getUri()->getPath()
            );

            $uri = new Uri($path);

            $request = $request->withUri($uri);
        }

        return $request;
    }

}