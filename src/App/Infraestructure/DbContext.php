<?php

namespace App\Infraestructure;

use \PDO;

class DbContext
{
    private $stringConnection = 'sqlite:/home/datacom/Documents/Dev/php-tools/app/data/db.sqlite';
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getContext()
    {
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->
    }
}
