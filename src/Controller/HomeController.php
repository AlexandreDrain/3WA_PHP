<?php

namespace App\Controller;

use Projet_3WA_PHP\AbstractController;

class HomeController extends AbstractController 
{
    public function print() 
    {
        //include dirname( __DIR__ ) . "/../templates/accueil.html.twig";
        return $this->render('accueil');
    }
}