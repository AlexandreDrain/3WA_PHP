<?php

namespace App\Controller;

class Home {
    
    public function print() {
        include dirname( __DIR__ ) . "/../templates/accueil.html.twig";
    }
}