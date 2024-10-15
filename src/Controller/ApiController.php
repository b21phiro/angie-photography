<?php

namespace Phro\Web\Controller;

use JetBrains\PhpStorm\NoReturn;
use Phro\Web\Factory\UserFactory;

class ApiController
{

    public function helloWorld(): void
    {
        if ($_SERVER['REQUEST_METHOD'] != 'GET')
        {
            self::sendException(new \Exception("Unsupported method", 405));
        }
        print_r(
            json_encode(
                [
                    "code" => 200,
                    "message" => "Hello world!"
                ]
            )
        );
    }

    public function createUser(): void
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST')
        {
            self::sendException(new \Exception("Unsupported method", 405));
        }

        $email = (isset($_POST["email"])) ? htmlspecialchars($_POST["email"]) : null;
        $password = (isset($_POST["password"])) ? htmlspecialchars($_POST["password"]) : null;
        $firstname = (isset($_POST["firstname"])) ? htmlspecialchars($_POST["firstname"]) : null;
        $surname = (isset($_POST["surname"])) ? htmlspecialchars($_POST["surname"]) : null;

        if (!$email || !$password)
        {
            self::sendException(new \Exception("Missing fields", 401));
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            self::sendException(new \Exception("Bad fields", 401));
        }

        try
        {
            UserFactory::create
            (
                $email,
                $password,
                $firstname,
                $surname
            );
            print_r(
                json_encode(
                    [
                        "code" => 200,
                        "message" => "Created user!"
                    ]
                )
            );
        } catch (\Exception $exception)
        {
            self::sendException($exception);
        }
    }

    public function deleteUser(): void
    {

        if ($_SERVER["REQUEST_METHOD"] != "DELETE")
        {
            self::sendException(new \Exception("Unsupported method", 405));
        }

        $input = explode("id=", file_get_contents('php://input'));
        $id = (isset($input[1])) ? (int) htmlspecialchars($input[1]) : null;

        if (!$id)
        {
            self::sendException(new \Exception("Missing fields", 401));
        }

        try
        {
            UserFactory::removeUser($id);
            print_r(
                json_encode(
                    [
                        "code" => 200,
                        "message" => "User deleted successfully!"
                    ]
                )
            );
        } catch (\Exception $exception)
        {
            self::sendException($exception);
        }

    }

    #[NoReturn]
    public function sendException(\Exception $exception): void
    {
        http_response_code((int)$exception->getCode());
        print_r
        (
            json_encode
            (
                [
                    "code" => $exception->getCode(),
                    "message" => $exception->getMessage()
                ]
            )
        );
        exit();
    }

}