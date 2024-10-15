<?php

namespace Phro\Web\Controller;

use Exception;
use JetBrains\PhpStorm\NoReturn;
use Phro\Web\Config\Env;
use Phro\Web\Factory\UserFactory;
use Phro\Web\View\View;

class LoginController
{

    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function login(): void
    {
        try
        {
            $response = $this->view->routeView("login/index.php",
                [
                    "title" => "Log in | "
                ]
            );

            $body = $response->getBody();

            if ($body->isReadable())
            {
                while (!$body->eof())
                {
                    echo $body->read(1024);
                }
            }

        } catch (Exception $exception)
        {

        }
    }

    public function authenticate(): void
    {

        $email = (isset($_POST["email"])) ? htmlspecialchars($_POST["email"]) : "";
        $password = (isset($_POST["password"])) ? htmlspecialchars($_POST["password"]) : "";
        $submit = isset($_POST["submit"]);

        if (!$email || !$password || !$submit)
        {
            $this->redirectResponse(Env::BaseRoute()."/login?error=empty");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $this->redirectResponse(Env::BaseRoute()."/login?error=bad");
        }

        try
        {
            $user = UserFactory::selectUserByEmail($email);

            if (!$user->verifyPassword($password))
            {
                $this->redirectResponse(Env::BaseRoute()."/login?error=bad");
            }

        } catch (Exception $exception)
        {
            $this->redirectResponse(Env::BaseRoute()."/login?error=bad");
        }

    }

    #[NoReturn]
    protected function redirectResponse(string $location): void
    {
        header("Location: $location");
        exit();
    }

}