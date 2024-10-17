<?php

namespace Phro\Web\Exception;

class ControllerFactoryException extends \Exception
{
    public function createException(): self
    {
        return new self(sprintf("<h1>Error 500</h1><p>%s</p>", $this->getMessage()), 500);
    }
}