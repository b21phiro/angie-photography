<?php

namespace Phro\Web\Database;

use PDO;
use PDOException;
use Phro\Web\Config\Env;

class Database extends PDO
{
    private static Database $instance;
    protected function __construct()
    {
        $dsn = sprintf("mysql:host=%s;dbname=%s;", Env::DatabaseHost(), Env::DatabaseName());
        try
        {
            parent::__construct
            (
                $dsn,
                Env::DatabaseUser(),
                Env::DatabasePassword()
            );
        } catch (PDOException $exception)
        {
            $this->handlePdoException($exception);
        }
    }
    public static function getInstance(): Database
    {
        if (!isset(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    protected function handlePdoException(PDOException $exception): void
    {
        echo "<h1>Error {$exception->getCode()}</h1>";
        echo "<p>Message: {$exception->getMessage()}</p>";
        echo "<p>File: {$exception->getFile()}</p>";
        echo "<p>Line: {$exception->getLine()}</p>";
        echo "<p>Trace: {$exception->getTraceAsString()}</p>";
    }
}