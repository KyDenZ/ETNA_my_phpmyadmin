<?php

namespace Controllers;

use Models\Users;

class IndexController extends Controller
{
    private $array = [];

    public function index()
    {
        $this->twig->display('index.html.twig');
    }

    public function checkLogin()
    {
        $userClass = new Users();
        $login = isset($_POST["login"]) ? $_POST["login"] : null;
        $password = isset($_POST["password"]) ? $_POST["password"] : null;
        $uid = $userClass->Login($login, $password);
        if ($uid) {
            $_SESSION["id_user"] = $uid;
            header('Location: /');
        } else {
            $this->array = ["error" => "true"];
        }
    }
}
