<?php

namespace Models;

use Lib\Bdd;

class DataBase
{
    public $name;

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    public function getDatabases(): array {
        $pdo = Bdd::getInstance();
        $requete = $pdo->prepare('SHOW DATABASES');
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getTables($name = null): array {
        $name = $name ? $name : $this->name;
        $pdo = Bdd::getInstance();
        $pdo->exec("USE ".$name);
        $requete = $pdo->prepare('SHOW TABLES');
        $requete->execute();
        return $requete->fetchAll();
    }

    //array_collection<database>

}