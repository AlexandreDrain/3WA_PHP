<?php

namespace Projet_3WA_PHP;

use Twig\Environment;
use Projet_3WA_PHP\FlashBag;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{
    private $templateEngine;

    private $flashbag;
 
    public function __construct() 
    {
        $loader = new FilesystemLoader(dirname(dirname(__DIR__)) . '/templates');
        $this->templateEngine = new Environment($loader);
        $this->flashbag = new FlashBag();
    }
 
 
    protected function render($view, $vars = [])
    {
        return $this->templateEngine->render($view.'.html.twig', $vars);
    }

    protected function flash()
    {
        return $this->flashbag;
    }

    protected function redirectToRoute($url)
    {
        header('location:'.$url);
        exit();
    }
}