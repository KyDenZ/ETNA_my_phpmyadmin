<?php

namespace Controllers;
use Models\Users;

class IndexController extends Controller
{
    private $array = [];

    public function index()
    {
        echo "ok";
    }

    public function checkLogin()
    {
        $userClass = new Users();
        $login = isset($_POST["login"]) ? $_POST["login"] : NULL;
        $password = isset($_POST["password"]) ? $_POST["password"] : NULL;
        $uid = $userClass->Login($login, $password);
        if ($uid) {
            $_SESSION["id_user"] = $uid;
            header('Location: /');
        } else {
            $this->array = ["error" => "true"];
        }
    }
}