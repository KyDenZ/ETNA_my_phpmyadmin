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
    }

     public function save(){
        $pdo = Bdd::getInstance();
        $pdo->exec("USE ".$this->bdname);
        $requete = $pdo->prepare("CREATE TABLE ".$this->name." (id INT)");
        // var_dump($this->fields[0]->type);
        // var_dump($this->fields[0]->name);
        // var_dump($this->fields[0]->bdTable);
        // var_dump($this->fields[0]->valeurDefault);
        // var_dump($this->fields[0]->null);
        $requete->execute();
        // $sql = "ALTER TABLE ".$this->name." ADD COLLUM ".$this->
        // $sql = "ALTER TABLE".$this->name." CHANGE ".$this-> INT(11) UNSIGNED NOT NULL AUTO_INCREMENT"
        // ALTER TABLE `test` CHANGE `nom1` `nom1` VARCHAR(11) NOT NULL;
    }

     public function saveField()
    {
        $pdo = Bdd::getInstance();
        $pdo->exec("USE " . $this->bdname);
        $requete = $pdo->prepare('ALTER TABLE ' . $this->fields[0]->bdTable . ' CHANGE ' . $this->fields[0]->name . ' ' . $this->fields[0]->name . ' ' . $this->fields[0]->type . ' ' . $this->fields[0]->null . ';');
        var_dump($requete);
        $requete->execute();
    }

    // array(0) { } array(1) { [0]=> object(Models\Fields)#18 (6) { ["name"]=> string(3) "nom" ["bdname"]=> string(13) "my_phpmyadmin" ["bdTable"]=> string(5) "table" ["type"]=> string(3) "INT" ["valeurDefault"]=> string(18) "valeur par défaut" ["null"]=> string(8) "NOT NULL" } }

    
}