<?php

use FastRoute\RouteCollector;

return function(RouteCollector $r) {

    $r->addRoute('GET', '/', 'App\Controller\Home::print');

    $r->addRoute('GET', '/contact', 'App\Controller\Contact::print');

    $r->addRoute('GET', '/inscription', 'App\Controller\LogUp::print');

    $r->addRoute('POST', '/inscription', function() {
    
        if (isset($_POST['submit'])) {
            echo 'Page de contact  <br /><a href="/">Retour à l\'accueil</a><br>';
            echo 'Bienvenue ' . $_POST['firstName'] . ' ' . $_POST['lastName'] . ' !<br>';
        }
    });
};