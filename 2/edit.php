<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 18:28
 */

//Controller

require __DIR__ . './models/News.php';

if (empty($_GET['news_id'])) {
    header("Location: ./");
}

$news = new News();
$news->news_id = $_GET['news_id'];
$data = $news->view();

include __DIR__ . './views/edit.php';