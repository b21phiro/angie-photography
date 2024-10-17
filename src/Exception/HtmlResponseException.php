<?php

namespace Phro\Web\Exception;

class HtmlResponseException extends \Exception
{
    public function __construct()
    {
        parent::__construct("HTML file does not exist", 404, null);
    }
}