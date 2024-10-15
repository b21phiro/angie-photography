<?php

namespace Phro\Web\Config;

class Env
{
    public static function BaseRoute(): string
    {
        return $_ENV['WEBSITE_BASE_ROUTE'] ?? "";
    }
    public static function DatabaseHost(): string
    {
        return $_ENV['DATABASE_HOST'] ?? "";
    }
    public static function DatabaseUser(): string
    {
        return $_ENV['DATABASE_USER'] ?? "";
    }
    public static function DatabasePassword(): string
    {
        return $_ENV['DATABASE_PASSWORD'] ?? "";
    }
    public static function DatabaseName(): string
    {
        return $_ENV['DATABASE_NAME'] ?? "";
    }
}