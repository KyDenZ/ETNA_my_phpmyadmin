<?php

namespace Controllers;

use Models\Users;
use Models\DataBase;
use Lib\Bdd;

class IndexController extends Controller
{
    private $array = [];

    public function index()
    {
        if (isset($_SESSION["id_user"])) {
            $this->version();
            $this->count();
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
            redirect_to('/');
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
        //$versionApache = apache_get_version();
        $versionApache = "1.0";
        $versionPhp = phpversion();
        $pdo = Bdd::getInstance();
        $versionMysql = $pdo->query('select version()')->fetchColumn();
        $this->array["version"] = ["version_php" => $versionPhp, "version_mysql" => $versionMysql, "version_apache" => $versionApache];
    }


    public function createDataBase()
    {
        if (isset($_POST['newbdd-submit']) && !empty($_POST["nameBdd"])) {
            $dataBase = new Database($_POST['nameBdd']);
            $dataBase->save();
            redirect_to('/');
        }
    }

    public function count() {
        $dataBase = new DataBase();
        $users = new Users();
        $this->array["count"] = ["databases" => count($dataBase->getDatabases()), "users" => count($users->getUsers()), "sizeBdd" => $dataBase->getSizeAllDatabases()];
    }
}

