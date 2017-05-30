<?php

namespace Controllers;
use Models\Users;

class IndexController extends Controller
{
    public function index()
    {
        echo $this->twig->render('login.html');
        if (isset($_POST['login-submit'])) {
            $this->checkLogin();
        }
    }

    public function checkLogin()
    {
        $userClass = new Users();
        $login = isset($_POST["login"]) ? $_POST["login"] : NULL;
        $password = isset($_POST["password"]) ? $_POST["password"] : NULL;
        $uid = $userClass->Login($login, $password);
        var_dump($uid);
    }
}