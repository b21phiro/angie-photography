<?php

namespace Angie\Web;

class Database {

    protected string $user;
    protected string $password;
    protected string $host;
    protected string $name;

    public function __construct(string $user, string $password, string $host, string $name) {
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->name = $name;
    }

}