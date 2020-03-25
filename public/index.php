<?php

require dirname( __DIR__ ) . "/vendor/autoload.php";

$kernel = new Projet_3WA_PHP\Kernel();
$kernel->run();

// $loader = new \Twig\Loader\FilesystemeLoader([dirname( __DIR__ ) . "/templates"]);
// $twig = new \Twig\Environment($loader);