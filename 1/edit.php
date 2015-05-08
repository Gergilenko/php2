<?php
//Controller

require __DIR__ . './models/news.php';

if (empty($_GET['news_id'])) {
    header("Location: ./");
}

$data = News_getById($_GET['news_id']);

include __DIR__ . './views/edit.php';