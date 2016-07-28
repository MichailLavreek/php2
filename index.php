<?php

require __DIR__ . '/autoload.php';

$news = \App\Models\News::findById(3);
var_dump($news->author);
