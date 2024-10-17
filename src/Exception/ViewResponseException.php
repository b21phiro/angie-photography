<?php

namespace Phro\Web\Exception;

class ViewResponseException extends \Exception
{
    public function __construct()
    {
        parent::__construct("View file does not exist", 404);
    }
}