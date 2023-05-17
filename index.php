<?php

use components\Router;

define("ROOT", dirname(__FILE__));

session_start();

require_once ROOT.'/helper.php';
require_once ROOT.'/vendor/autoload.php';

$router = new Router;
$router->run();


