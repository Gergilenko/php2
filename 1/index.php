<?php
//Controller

require __DIR__ . './models/news.php';

$news = News_getAll();


include __DIR__ . './views/index.php';