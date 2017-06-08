<?php

namespace Models;

use Lib\Bdd;

class Tables
{

    public $name;
    public $bdname;
    public $bdTable;
    public $type;
    public $valeurDefault;
    public $null;

    public function __construct($name = null, $bdname = null, $bdTable = null, $type = null, $valeurDefault = null, $null = null)
    {
        $this->name = $name;
        $this->bdname = $bdname;
    }

    public function getField()
    {
        
    }

    public function getFields($name = null)
    {
        $pdo = Bdd::getInstance();
        $pdo->exec("USE ".$this->bdname);
        $requete = $pdo->prepare('SHOW COLUMNS FROM '.$this->name);
        $requete->execute();
        return $requete->fetchAll();
    }

}