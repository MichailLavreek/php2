<?php

require __DIR__ . '/../../autoload.php';


$id = $_GET['id'];

use App\View;

$view = new View;
$view->user = \App\Models\User::findById($id);

echo $view->render(__DIR__ . '/../templates/article.php');