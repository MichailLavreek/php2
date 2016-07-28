<?php

require __DIR__ . '/../../autoload.php';

use App\View;

$view = new View;
$view->news = \App\Models\News::findAll();
echo $view->render(__DIR__ . '/../templates/index.php');