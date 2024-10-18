<?php

namespace Phro\Web\Controller;

use GuzzleHttp\Psr7\Response;
use Phro\Web\Config\Env;
use Phro\Web\Response\RedirectResponse;
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

    public function login(): ViewResponse
    {
        return new ViewResponse("admin/login.php");
    }

    public function authenticate(): Response
    {
        $email = (isset($_POST["email"])) ? htmlspecialchars($_POST["email"]) : null;
        $password = (isset($_POST["password"])) ? htmlspecialchars($_POST["password"]) : null;
        $submit = isset($_POST["submit"]);

        if (!$email || !$password || !$submit)
        {
            return new RedirectResponse(Env::BaseRoute()."/admin/login?error=bad");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            return new RedirectResponse(Env::BaseRoute()."/admin/login?email=".$email);
        }

        return new RedirectResponse(Env::BaseRoute()."/admin");
    }

}