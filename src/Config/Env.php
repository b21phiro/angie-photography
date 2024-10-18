<?php

namespace Phro\Web\Config;

class Env
{
    public static function BaseRoute(): string
    {
        return $_ENV['WEBSITE_BASE_ROUTE'] ?? "";
    }

    public static function Lang(): string
    {
        return $_ENV['ADMIN_LANG'] ?? "en";
    }
}