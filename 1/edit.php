<?php
//Controller

require __DIR__ . './models/news.php';

$news_id = $_GET['news_id'];

$data = array_pop(News_getById($news_id));


include __DIR__ . './views/edit.php';