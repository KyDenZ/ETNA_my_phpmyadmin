<?php

namespace Controllers;

use Models\Users;

class IndexController extends Controller
{
    private $array = [];

    public function index()
    {
        if (isset($_SESSION["id_user"])) {
            $versionphp = phpversion();
            // $versionapache = apache_get_version();
            $link = mysql_connect('localhost', 'root', 'root');
                if (!$link) {
                    die('Impossible de se connecter à la base : ' . mysql_error());
                }
            $versionmysql = mysql_get_server_info();
            var_dump($versionmysql);
            $this->twig->display('index.html.twig', array("php_version" =>$versionphp), 
            array("mysql_version" =>$versionmysql, array("apache_version" =>$versionapache)));
        } else {
            $this->twig->display('login.html.twig');
        }
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
            
            $this->twig->display('login.html.twig', $this->array);
        }
    }

    public function login()
    {
        if (isset($_POST['login-submit']) && !empty($_POST["login"])) {
            $this->checkLogin();
        } else {
            if (isset($_SESSION["id_user"])) {
                var_dump(phpversion());
                echo 'Version PHP courante : ' . phpversion();
                $this->twig->display('index.html.twig');
            } else {
                $this->twig->display('login.html.twig');
            }
        }
    }

}
