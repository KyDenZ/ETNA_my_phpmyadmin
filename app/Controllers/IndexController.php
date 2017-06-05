<?php

namespace Controllers;

use Models\Users;
use Lib\Bdd;

class IndexController extends Controller
{
    private $array = [];

    public function index()
    {
        if (isset($_SESSION["id_user"])) {
            $this->version();
            include("app/Views/index.php");
        } else {
            include("app/Views/login.php");
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
            include("app/Views/login.php");
        }
    }

    public function login()
    {
        if (isset($_POST['login-submit']) && !empty($_POST["login"])) {
            $this->checkLogin();
        } else {
            if (isset($_SESSION["id_user"])) {
                include("app/Views/index.php");
            } else {
                include("app/Views/login.php");
            }
        }
    }

    public function version()
    {
        $versionapache = apache_get_version();
        $versionphp = phpversion();
        $pdo = Bdd::getInstance();
        $versionmysql = $pdo->query('select version()')->fetchColumn();
        $this->array["version"] = ["version_php" => $versionphp, "version_mysql" => $versionmysql, "version_apache" => $apache_get_version];
        $this->array;
    }
}
