<?php

namespace App\Controller;

class LogUp {
    
    public function print() {
        echo 'Page de contact  <br /><a href="/">Retour à l\'accueil</a><br>';
        include dirname( __DIR__ ) . '/../templates/formulaire.html.twig';
    }
}