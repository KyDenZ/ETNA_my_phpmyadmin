<?php

namespace Models;

class Users
{
    public $id;
    public $login;
    public $password;

    private function __construct()
    {
    }

    public function Login($login, $password)
    {
      $hash_password = hash('sha256', $password); //Password encryption
      return 1;
        // if (!is_null($login) && !is_null($password)) {
        //     $bdd = Bdd::getInstance();
        //     $bdd->preparation('SELECT * FROM `users` WHERE "login" = "'.$login.'" AND password = ' . $password .'');
        //     $bdd->execution();
        //     $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        //     if ($result >= 1) {
        //         return true;
        //     }
        // } else {
        //   return false;
        }
    }
}
