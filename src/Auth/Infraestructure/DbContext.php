<?php

namespace Auth\Infraestructure;

use \PDO;

class DbContext
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO(DSN);
    }

    public function getContext()
    {
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->pdo;
    }
}
