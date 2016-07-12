<?php

namespace Auth\Infraestructure;

use \PDO;

class DbContext
{
    private $stringConnection = 'sqlite::memory:';
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO($this->stringConnection);
    }

    public function getContext()
    {
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->pdo;
    }
}
