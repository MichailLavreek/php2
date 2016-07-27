<?php

require __DIR__ . '/../../autoload.php';

use App\Models\News;

$data = News::findAll();

include __DIR__ . '/templates/index.php';