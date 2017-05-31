<?php
require __DIR__.'/vendor/autoload.php';

use PHPRouter\RouteCollection;
use PHPRouter\Config;
use PHPRouter\Router;
use PHPRouter\Route;

$config = Config::loadFromFile(__DIR__.'/router.yaml');
$router = Router::parseConfig($config);
$router->matchCurrentRequest();