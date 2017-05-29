<?php

namespace Controllers;

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
        //$userClass = new Users();
        //$uid = $userClass->Login($_POST["login"], $_POST["password"]);
        //var_dump($uid);
    }
}
