<?php
require __DIR__ . './models/news.php';

if (!empty($_GET['news_id'])) {

    News_delete($_GET['news_id']);

}

header('Location: ./');