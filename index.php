<?php

use core\Router;
use core\Session;

session_start();
const BASE_PATH = __DIR__.'/';
require BASE_PATH . 'core/functions.php';
require base_path('/vendor/autoload.php');

$router = new Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();
