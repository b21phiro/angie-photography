<?php

namespace Phro\Web\Controller;

use Phro\Web\Exception\HtmlResponseException;
use Phro\Web\Response\HtmlResponse;

class WebController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @throws HtmlResponseException
     */
    public function htmlResponseAction(): HtmlResponse
    {
        return new HtmlResponse(200, __DIR__."/../../public/index.html");
    }

}