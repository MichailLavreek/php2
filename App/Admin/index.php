<?php

require __DIR__ . '/../../autoload.php';

$url = $_SERVER['REQUEST_URI'];

$controller = (!empty($_GET['ctr'])) ? $_GET['ctr'] : 'News';
$controller = '\App\Admin\Controllers\\' . $controller;
$action = (!empty($_GET['act'])) ? $_GET['act'] : 'Default';

$index = new $controller;
$index->action($action);