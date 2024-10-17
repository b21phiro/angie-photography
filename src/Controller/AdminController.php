<?php

namespace Phro\Web\Controller;

use Phro\Web\Exception\HtmlResponseException;
use Phro\Web\Response\HtmlResponse;
use Phro\Web\Response\JsonResponse;
use Phro\Web\Response\ViewResponse;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function dashboard(): ViewResponse
    {
        return new ViewResponse("admin/dashboard.php");
    }

}