<?php

namespace Controllers;

use Lib\Bdd;
use Models\Tables;
use Models\Fields;

class SqlController extends Controller
{
    private $array = [];

    public function request()
    {   var_dump($_POST['requestSQL']);
        if (isset($_POST['requestSQL'])) {
            try {

                $pdo = Bdd::getInstance();
                $pdo->exec("USE my_phpmyadmin");
                $result = $pdo->prepare($_POST['requestSQL']);
                $result->execute();
                $result->fetchAll();

                while (($db = $result->fetchColumn(0)) !== false) {
                    $html .= $db . '<br>';
                }

            } catch (Exception $e) {
                $html .= $e->getMessage();
            }
            echo $html;
        }
    }
}

$sql = new SidemenuController();