<?php

namespace Controllers;

use Lib\Bdd;
use Models\Tables;
use Models\Fields;

class TableInfosController extends Controller
{
    private $array = [];

    public function index()
    {
        $table = new Tables($_GET["table"], $_GET["bdd"]);
        $this->array["bdd_name"] = $table->bdname;
        $this->array["table_name"] = $table->name;
        $this->array["data"] = $table->getData();
        var_dump($this->array["data"]);
        include("app/Views/tableInfos.php");
        //var_dump($this->array["fields"]);
    }
}
