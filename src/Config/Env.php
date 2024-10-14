<?php

namespace Phro\Web\Config;

class Env
{

    public static function BaseRoute(): string
    {
        return $_ENV['WEBSITE_BASE_ROUTE'] ?? "";
    }

}