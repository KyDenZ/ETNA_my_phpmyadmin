<?php

namespace Models;

use Lib\Bdd;

class Fields
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

    public function updateField($newName = null)
    {
        $newName = $newName ? $newName : $this->name;
        $pdo = Bdd::getInstance();
        $pdo->exec("USE ".$this->bdname);
        $requete = $pdo->prepare('ALTER TABLE '.$this->bdTable.' CHANGE '.$this->name.' '.$newName.' '.$this->type.' SET latin1 COLLATE latin1_swedish_ci '.$null.' '.$valeurDefault.';');
        $requete->execute();
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