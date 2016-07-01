<?php

namespace Auth\Infraestructure;

use \PDO;

class DbContext
{
    private $stringConnection = 'sqlite:/home/wescleymatos/Documents/Dev/test-tools/app/data/db.sqlite';
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
