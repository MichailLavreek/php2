<?php

require __DIR__ . '/../../autoload.php';

use App\View;

$view = new View;
$view->users = \App\Models\User::findAll();
echo $view->render(__DIR__ . '/../templates/index.php');