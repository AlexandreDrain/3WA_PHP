<?php

namespace Projet_3WA_PHP;

use Projet_3WA_PHP\AbstractController;

class ErrorController extends AbstractController 
{
    public function error_404() 
    {
        return $this->render('errors/error_404');
    }

    public function error_405() 
    {
        return $this->render('errors/error_405');
    }
}