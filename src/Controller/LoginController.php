<?php

namespace Phro\Web\Controller;

use Exception;
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
        var_dump($_POST);
    }

}