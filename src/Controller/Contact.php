<?php

namespace App\Controller;

class Contact {
    
    public function print() {
        include dirname( __DIR__ ) . "/../templates/contact.html.twig";
    }
}