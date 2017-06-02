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
        $pdo = Bdd::getInstance();
        $requete = $pdo->prepare('SELECT * FROM `users` WHERE `login` = :login AND password = :password');
        $requete->execute([':login' => $login, ':password' => md5($password)]);
        $result = $requete->fetch();
        if ($result == null) {
            return 0;
        }
        return $result["id"];
    }
}
