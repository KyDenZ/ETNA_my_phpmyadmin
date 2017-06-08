<?php

namespace Controllers;

use Models\DataBase;
use Lib\Bdd;

class TablesController extends Controller
{
    private $array = [];

    public function index()
    {
        $bdd = new DataBase($_GET["table"]);
        $this->array["table_title"] = $bdd->name;
        $this->array["tables"] = $bdd->getTables();
        include("app/Views/tables.php");
    }

    public function deleteDatabase()
    {
        $table = new Table($_GET["table"]);
        $table->deleteDatabase();
    }

    public function createTable() {
        $table = new Table($name[$_POST["nameTable"]]);
        $table->setFields();
    }
}