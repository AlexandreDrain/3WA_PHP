<?php

class Router {
    
    public function addRoute() {

        // Fetch method and URI from somewhere 
        $httpMethod = $_SERVER['REQUEST_METHOD']; // SI c'est du POST ou du GET
        // Strip query string (?foo=bar) and decode URI
        $uri = $_SERVER['REQUEST_URI']; // contenue get de la barre de recherche, URI litteralement 
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
            call_user_func_array($method, $routeInfo[2]);
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