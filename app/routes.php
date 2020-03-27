<?php

use FastRoute\RouteCollector;

return function(RouteCollector $r) {

    $r->addRoute('GET', '/', 'App\Controller\HomeController::print');
};