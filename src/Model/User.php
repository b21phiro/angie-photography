<?php

namespace Phro\Web\Model;

class User
{
    protected int $id;
    protected string $password;
    protected string $email;
    public ?string $firstname;
    public ?string $surname;

    public function __construct
    (
        int $id,
        string $email,
        string $password,
        ?string $firstname,
        ?string $surname
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->surname = $surname;
    }

    public function verifyPassword($password): bool
    {
        return password_verify($password, $this->password);
    }

}