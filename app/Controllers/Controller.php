<?php

namespace Controllers;

use \Twig_Loader_Filesystem;
use \Twig_Environment;

class Controller
{
    protected $twig;

    function __construct()
    {
        $loader = new Twig_Loader_Filesystem(
            array (
                "./app/Views",
            )
        );
        // set up environment
        $params = array(
            'cache' => "../cache",
            'auto_reload' => true, // disable cache
            'autoescape' => true
        );
        $this->twig = new Twig_Environment($loader, $params);
        $this->twig->addGlobal('session', $_SESSION);
    }
}
