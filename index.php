<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];
var_dump($url);

$controller = (!empty($_GET['ctr'])) ? $_GET['ctr'] : 'News';
$controller = '\App\Controllers\\' . $controller;
$action = (!empty($_GET['act'])) ? $_GET['act'] : 'Default';

$index = new $controller;
$index->action($action);