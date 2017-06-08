<?php

namespace Controllers;

use Models\DataBase;
use Models\Tables;
use Models\Fields;
use Lib\Bdd;


class TablesController extends Controller
{
    private $array = [];

    public function index()
    {
        $bdd = new DataBase($_GET["dbname"]);
        $this->array["dbname_title"] = $bdd->name;
        $this->array["tables"] = $bdd->getTables();
        include("app/Views/tables.php");
    }

    public function deleteTable()
    {
        $table = new Tables($_GET["table"], $_GET["dbname"]);
        $table->deleteTable();
    }

    public function createTable() {
        if (isset($_POST['newTable-submit']) && !empty($_POST["nameTable"])) {
            $_POST["null"] = isset($_POST["null"]) ? $_POST["null"] : "off";
        $table = new Tables($_POST["nameTable"], $_POST["dbname"]);
        $field = new Fields($_POST["nameStruct"], $_POST["dbname"], $_POST["nameTable"], $_POST["type"], $_POST["defaultValue"], $_POST["null"]);
        $table->setField($field);
        $this->fields = [];
        var_dump($this->fields = []);
        $table->save();
    }
    }
}