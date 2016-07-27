<?php

require __DIR__ . '/../../autoload.php';


$id = $_GET['id'];
$data = \App\Models\News::findById($id);

include __DIR__ . '/../Templates/article.php';