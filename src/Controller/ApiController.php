<?php

namespace Phro\Web\Controller;

use Phro\Web\Exception\HtmlResponseException;
use Phro\Web\Response\HtmlResponse;
use Phro\Web\Response\JsonResponse;

class ApiController extends Controller
{
    public function __construct()
    {
    }

    public function hello(): JsonResponse
    {
        return new JsonResponse(200, ['message' => 'Hello world!']);
    }

}