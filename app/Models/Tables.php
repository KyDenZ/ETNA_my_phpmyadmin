<?php

namespace Models;

use Lib\Bdd;

class Tables
{

    public $name;
    public $bdname;

    public function __construct($name = null, $bdname = null)
    {
        $this->name = $name;
        $this->bdname = $bdname;
    }

    public function getFields($name = null)
    {
        $pdo = Bdd::getInstance();
        $pdo->exec("USE ".$this->bdname);
        $requete = $pdo->prepare('SHOW COLUMNS FROM '.$this->name);
        $requete->execute();
        return $requete->fetchAll();
    }

    public function deleteTable() {
        $pdo = Bdd::getInstance();
        $pdo->exec("USE ".$this->bdname);
        $requete = $pdo->prepare("DROP TABLE ".$this->name);
        $requete->execute();
    }

}