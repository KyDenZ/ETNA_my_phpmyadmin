<?php

namespace Models;

use Lib\Bdd;

class Tables
{

    public $name;
    public $bdname;
    public $fields;

    public function __construct($name = null, $bdname = null)
    {
        $this->name = $name;
        $this->bdname = $bdname;
        $this->fields = [];
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

    public function createTable() {
        $pdo = Bdd::getInstance();
        $requete = $pdo->prepare("CREATE TABLE".$name);
    }

    public function setField($field) {
        $this->fields[] = $field;
        var_dump($this->fields);
    }

     public function save(){
        $pdo = Bdd::getInstance();
        $pdo->exec("USE ".$this->bdname);
        $sql = "CREATE TABLE ".$this->name." (id INT)";
        $sql = "ALTER TABLE ".$this->name." ADD COLLUM ".$this->
        var_dump($sql);
        $pdo->exec($sql);
    }

    
}