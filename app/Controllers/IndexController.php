<?php

namespace Controllers;
use Models\Users;

class IndexController extends Controller
{
    private $array = [];

    public function index()
    {
        if (isset($_POST['login-submit'])) {
            $this->checkLogin();
        } else {
            if (isset($_SESSION["id_user"]))
                echo $this->twig->render('index.html', $this->array);
            else
                echo $this->twig->render('login.html', $this->array);
        }
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