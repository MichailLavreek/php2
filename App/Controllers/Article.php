<?php

require __DIR__ . '/../../autoload.php';


$id = $_GET['id'];
$data = \App\Models\News::findById($id)[0];

include __DIR__ . '/../Templates/article.php';