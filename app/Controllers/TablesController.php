<?php

namespace Controllers;

use Models\DataBase;
use Models\Tables;
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
        $table = new Tables($_POST["nameTable"], $_POST["dbname"]);
        $field = new Fields($nameField, $bdnameField, $namestructField, $typeField, $nullField);
        $table->setField($field);
        $table->save();
    }
    }
}