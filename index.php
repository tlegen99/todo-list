<?php

use components\Router;
use components\Db;

define("ROOT", dirname(__FILE__));

session_start();

require_once ROOT.'/helper.php';
require_once ROOT.'/vendor/autoload.php';

Db::connection();

$router = new Router;
$router->run();


