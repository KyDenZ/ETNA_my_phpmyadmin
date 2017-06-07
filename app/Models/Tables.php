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

    public function getField($name = null)
    {
        $name = $name ? $name : $this->name;
        $pdo = Bdd::getInstance();
        $pdo->exec("USE " . $name);
        $requete = $pdo->prepare('SHOW TABLES');
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