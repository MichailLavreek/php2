<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\News::getLastNews(3);

include __DIR__ . '/App/Templates/index.php';
