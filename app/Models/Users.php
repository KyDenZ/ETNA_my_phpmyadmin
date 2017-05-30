<?php

namespace Models;

class Users
{
    public $id;
    public $login;
    public $password;

    public function __construct()
    {
    }

    public function Login($login, $password)
    {
        if (!is_null($login) && !is_null($password)) {
            $bdd = Bdd::getInstance();
            $bdd->preparation('SELECT * FROM `users` WHERE "login" = "'.$login.'" AND password = "'.md5($password));
            $bdd->execution();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            var_dump($result);
            if ($result >= 1) {
                return true;
            }
        } else {
            return false;
        }
    }
}
