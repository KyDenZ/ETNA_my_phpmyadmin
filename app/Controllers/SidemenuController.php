<?php

namespace Controllers;

use Models\DataBase;
use Lib\Bdd;

class SidemenuController extends Controller
{
    public $arrayBdd;

    public function index()
    {
        $dataBase = new DataBase();
        $allBdd = $dataBase->getDatabases();
        $rsltBdd = [];
        foreach ($allBdd as $bdd) {
            $bdd = $bdd[0];
            $allTables = $dataBase->getTables($bdd);
            foreach ($allTables as $table) {
                $table = $table[0];
                $rsltBdd[$bdd][] = $table;
            }
            if (!isset($rsltBdd[$bdd]))
                $rsltBdd[$bdd] = "";
        }
        $this->arrayBdd = $rsltBdd;
    }
}

$sideMenu = new SidemenuController();
$sideMenu->index();