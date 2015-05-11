<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 18:24
 */

require __DIR__ . './models/News.php';

if (!empty($_GET['news_id'])) {

    $news = new News();
    $news->news_id = $_GET['news_id'];
    $news->delete();

}

header('Location: ./');