<?php

namespace Controllers;

use Models\DataBase;
use Lib\Bdd;

class TablesController extends Controller
{
    public function index()
    {
       echo $_GET["table"];
    }
}