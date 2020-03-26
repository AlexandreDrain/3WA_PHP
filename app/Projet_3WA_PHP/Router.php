<?php

namespace Projet_3WA_PHP;

use FastRoute;

class Router {

    public function setRoutes() 
    {
        $route = include dirname(__DIR__) . '/routes.php';
        // Dispatcher Création des routes !
        return FastRoute\simpleDispatcher($route);
    }

    public function runRoute($dispatcher) 
    {
        // Fetch method and URI from somewhere
        $httpMethod = $_SERVER['REQUEST_METHOD']; // récupère le type de la route, GET ou POST etc
        $uri = $_SERVER['REQUEST_URI'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        
        $routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], rawurldecode($uri));
        if($routeInfo[0] == FastRoute\Dispatcher::FOUND) {
            // Je vérifie si mon parametre est une chaine de caractere
            if (is_string($routeInfo[1])) {
                // si dans la chaine reçu on trouve les ::
                if(strpos($routeInfo[1], '::') !== false) {
                    $route = explode('::', $routeInfo[1]);
                    $controller = new $route[0];
                    $method = [$controller, $route[1]];
                } else {
                    // sinon c'est directement la chaine qui nous interesse
                $method = $routeInfo[1];
                }
            } elseif (is_callable($routeInfo[1])) {
                $method = $routeInfo[1];
            }
            echo call_user_func_array($method, $routeInfo[2]);
        }
        // var_dump($httpMethod); // var_dump de $httmethod pour savori ce qu'elle contient
        // var_dump($uri); // var_dump de $uri pour savori ce qu'elle contient
        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                include dirname( __DIR__ ) . '/../templates/error.phtml';
                break;
        }
    }
}