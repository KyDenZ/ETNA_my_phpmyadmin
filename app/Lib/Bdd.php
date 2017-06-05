<?php

namespace Lib;

use \PDO;
 
class Bdd extends PDO
{
 
    private static $_instance;
 
    public function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            $strBddServeur = DB_SERVER;
            $strBddLogin = DB_USERNAME;
            $strBddPassword = DB_PASSWORD;
            $strBddBase = DB_DATABASE;
            try {
                self::$_instance = new PDO('mysql:host=' . $strBddServeur . ';dbname=' . $strBddBase, $strBddLogin, $strBddPassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            } catch (PDOException $e) {
                echo $e;
            }
        }
        return self::$_instance;
    }
}
