<?php

require_once __DIR__ . './lib/config.php';
require_once __DIR__ . './lib/Db.php';
require_once __DIR__ . './lib/Article.php';
require_once __DIR__ . './models/News.php';

$news = new News();
$data = $news->viewAll();

include __DIR__ . './views/index.php';