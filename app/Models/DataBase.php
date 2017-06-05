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

    public function getDatabases(): array
    {
        $pdo = Bdd::getInstance();
        $requete = $pdo->prepare('SHOW DATABASES');
        $requete->execute();
        return $requete->fetchAll();
    }

    public function getTables($name = null): array
    {
        $name = $name ? $name : $this->name;
        $pdo = Bdd::getInstance();
        $pdo->exec("USE " . $name);
        $requete = $pdo->prepare('SHOW TABLES');
        $requete->execute();
        return $requete->fetchAll();
    }


    public function save(){
        $pdo = Bdd::getInstance();
        $sql = "CREATE DATABASE ".$this->name;
        var_dump($sql);
        $pdo->exec($sql);
    }

    public function getSizeAllDatabases(): float
    {
        $pdo = Bdd::getInstance();
        $requete = $pdo->prepare('SELECT table_schema AS NomBaseDeDonnees, ROUND(SUM( data_length + 
          index_length ) / 1024 / 1024, 2) AS BaseDonneesMo FROM information_schema.TABLES
          GROUP BY TABLE_SCHEMA;');
        $requete->execute();
        $sizeData = 0;
        foreach ($requete->fetchAll() as $bdd) {
            $sizeData += floatval($bdd[1]);
        }
        return $sizeData;
    }

    //array_collection<database>

}