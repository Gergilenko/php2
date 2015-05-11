<?php

require __DIR__ . './models/News.php';

$news = new News();
$data = $news->viewAll();

include __DIR__ . './views/index.php';