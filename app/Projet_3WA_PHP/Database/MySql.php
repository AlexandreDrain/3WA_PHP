<?php

namespace Projet_3WA_PHP\Database;

use Projet_3WA_PHP\GenericSingleton;
use Projet_3WA_PHP\Database\IDatabase;

class MySql extends GenericSingleton implements IDatabase
{
    private $pdo;
    // En mettant le constructeur en visibilité protected on s'assure
    // que nous ne pourrons pas instancier cette classe depuis l'extérieur
    protected function __construct() 
    {
        //$this->pdo = new \PDO(include dirname( __DIR__) . "'mysql:host=localhost;dbname=projet_3wa_php','root', 'root'");
        $config = include dirname( __DIR__ ) . "/config.php";
        $this->pdo = new \PDO(
            $config['mysql']['dsn'],
            $config['mysql']['username'],
            $config['mysql']['password']
        );
    }
    
    public function getDatabase()
    {
        return $this->pdo;
    }
}