<?php

namespace Phro\Web\Exception;

class RouterException extends \Exception
{
    public function notFound(): self
    {
        return new self(sprintf("<h1>Error 404</h1><p>%s</p>", $this->getMessage()), 404);
    }
}