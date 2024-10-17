<?php

namespace Phro\Web\Exception;

class RouterException extends \Exception
{
    public function __construct()
    {
        parent::__construct("Page not found", 404);
    }
}