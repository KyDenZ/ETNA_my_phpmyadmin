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
        $pdo->exec("USE " . $this->bdname);
        $requete = $pdo->prepare('SHOW COLUMNS FROM ' . $this->name);
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getData()
    {
        $pdo = Bdd::getInstance();
        $pdo->exec("USE " . $this->bdname);
        $requete = $pdo->prepare('SELECT * FROM ' . $this->name);
        $requete->execute();
        return $requete->fetchAll();
    }

    public function deleteTable()
    {
        $pdo = Bdd::getInstance();
        $pdo->exec("USE " . $this->bdname);
        $requete = $pdo->prepare("DROP TABLE " . $this->name);
        $requete->execute();
    }

    public function createTable()
    {
        $pdo = Bdd::getInstance();
        $requete = $pdo->prepare("CREATE TABLE" . $name);
    }

    public function setField($field)
    {
        $this->fields[] = $field;
    }

    public function save()
    {
        $pdo = Bdd::getInstance();

        $pdo->exec("USE ".$this->bdname);
        $requete = $pdo->prepare("CREATE TABLE ".$this->name." (id INT)");
        $requete->execute();
    }

    public function saveField()
    {
        $pdo = Bdd::getInstance();
        $pdo->exec("USE " . $this->bdname);
        $requete = $pdo->prepare('ALTER TABLE '.$this->fields[0]->bdTable.' ADD '.$this->fields[0]->name.' '.$this->fields[0]->type.'('.$this->fields[0]->valeurDefault.') '. $this->fields[0]->null.';');
        $requete->execute();
    }
}