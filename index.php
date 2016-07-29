<?php

require __DIR__ . '/autoload.php';

$url = $_SERVER['REQUEST_URI'];

$controller = (!empty($_GET['ctr'])) ? $_GET['ctr'] : 'News';
$controller = '\App\Controllers\\' . $controller;
$action = (!empty($_GET['act'])) ? $_GET['act'] : 'Default';

try {

    $controller = new $controller;
    $controller->action($action);

} catch (\App\Exceptions\DB $e) {

    $controller = new \App\Controllers\Error($e);
    $controller->action('Default');

} catch (\App\Exceptions\Error404 $e) {

    $controller = new \App\Controllers\Error($e);
    $controller->action('Default');

} catch (\App\Exceptions\Data $e) {

    $controller = new \App\Controllers\Error($e);
    $controller->action('Default');

} catch (\App\Exceptions\MultiException $e) {

    $controller = new \App\Controllers\Error($e);
    $controller->action('Default');
    
}

