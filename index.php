<?php
require __DIR__.'/vendor/autoload.php';
include __DIR__."/config/config.php";
include __DIR__."/app/Lib/Route.php";

use PHPRouter\RouteCollection;
use PHPRouter\Config;
use PHPRouter\Router;
use PHPRouter\Route;

include 'app/Controllers/SidemenuController.php';
include 'app/Controllers/SqlController.php';
include __DIR__.'/app/include/header.php';
$config = Config::loadFromFile(__DIR__.'/router.yaml');
$router = Router::parseConfig($config);
$router->matchCurrentRequest();
include __DIR__.'/app/include/footer.php';