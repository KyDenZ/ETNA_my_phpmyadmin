<?php

namespace Controllers;

use \Twig_Loader_Filesystem;
use \Twig_Environment;

class Controller
{
    protected $twig;

    function __construct()
    {
    var_dump(get_class($this));
      $className = substr(get_class($this), 12, -10);
      // Twig Configuration
      var_dump($className);
      $loader = new Twig_Loader_Filesystem('./app/Views/' . strtolower($className));
      $this->twig = new Twig_Environment($loader, array(
          'cache' => false,
      ));
      //
    }
}