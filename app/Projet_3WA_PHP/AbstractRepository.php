<?php

namespace Projet_3WA_PHP;

use Projet_3WA_PHP\Database\ConnectMySql;

abstract class AbstractRepository 
{
    protected $db;

    public function __construct()
    {
        $connect = ConnectMySql::getInstance();
        $this->db = $connect->getPDO();
    }
}