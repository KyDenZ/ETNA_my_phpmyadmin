<?php

namespace Models;

class Bdd
{
    private static $connect = null;
    private $bdd;
 
    private function __construct()
    {
        $strBddServeur = DB_SERVER;
        $strBddLogin = DB_USERNAME;
        $strBddPassword = DB_PASSWORD;
        $strBddBase = DB_DATABASE;
             
        try {
            $this->bdd = new PDO('mysql:host='.$strBddServeur.';dbname='.$strBddBase, $strBddLogin, $strBddPassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }
 
    public static function getInstance()
    {
        if (is_null(self::$connect)) {
            self::$connect = new Bdd();
        }
        return self::$connect;
    }
     
    //----------------------------------------
    //FONCTIONS
    //----------------------------------------
        
    public function requete($req)
    {
        $query = $this->bdd->query($req);
        return $query;
    }

    public function preparation($req)
    {
        $query = $this->bdd->prepare($req);
        return $query;
    }

    public function execution($query, $tab)
    {
        $req = $query->execute($tab);
        return $req;
    }
 
    public function dernierIndex()
    {
        return $this->bdd->lastInsertId();
    }
}
