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

    public function Login(string $login, string $password): int
    {
        if (!is_null($login) && !is_null($password)) {
            $bdd = Bdd::getInstance();
            $stmt = $bdd->preparation('SELECT * FROM `users` WHERE `login` = "'.$login.'" AND password = "'.md5($password).'"');
            $bdd->execution($stmt);
            $result = $bdd->fetchData($stmt);
            if ($result == null)
                return 0;
            return $result["id"];
        }
    }
}

