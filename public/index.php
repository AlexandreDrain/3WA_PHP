<?php

require '../vendor/autoload.php';

$client = new \MongoDB\Client();


$kernel = new Projet_3WA_PHP\Kernel();
$kernel->run(dirname(__DIR__).'/app/routes.php');