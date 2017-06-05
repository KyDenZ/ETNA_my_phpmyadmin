<?php

namespace Controllers;

use Models\DataBase;
use Lib\Bdd;

class SidemenuController extends Controller
{
    public $arrayBdd;

    public function index()
    {
        $allBdd = $this->getBdd();
        $rsltBdd = [];
        foreach ($allBdd as $bdd) {
            $bdd = $bdd[0];
            $allTables = $this->getTable($bdd);
            foreach ($allTables as $table) {
                $table = $table[0];
                $rsltBdd[$bdd][] = $table;
            }
        }
        $this->arrayBdd = $rsltBdd;
    }

    private function getBdd()
    {
        $pdo = Bdd::getInstance();
        $requete = $pdo->prepare('SHOW DATABASES');
        $requete->execute();
        return $requete->fetchAll();
    }

    private function getTable(string $bdd)
    {
        $pdo = Bdd::getInstance();
        $pdo->exec("USE ".$bdd);
        $requete = $pdo->prepare('SHOW TABLES');
        $requete->execute();
        $reslt = $requete->fetchAll();
        return $reslt;
    }
}

$sideMenu = new SidemenuController();
$sideMenu->index();