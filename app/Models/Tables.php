<?php

namespace Models;

use Lib\Bdd;

class Table
{

    public $name;

    public function __construct($name = null)
    {
        $this->name = $name;
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

    public function deleteTable($name = null) {
        $name = $name ? $name : $this->name;
        $pdo = Bdd::getInstance();
        $requete = $pdo->prepare("DROP TABLE $name");
    }

    public function createTable() {
        $pdo = Bdd::getInstance();
        $requete = $pdo->prepare("CREATE TABLE $nameTable (`$nameStructure` $type $valueNull )");
    }

    public function setFields() {
        
    }
}