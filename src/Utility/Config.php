<?php

namespace Angie\Web\Utility;

class Config {

    public static function BASE_ROOT(): string {
        return $_ENV['BASE_PATH_ROOT'] ?? "";
    }

}