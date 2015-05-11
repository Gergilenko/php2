<?php

require __DIR__ . './models/News.php';

if (!empty($_POST)) {

    $news = new News();
    $news->title = substr($_POST['title'], 0, 100);
    $news->text = $_POST['text'];
    $news->news_id = $_POST['news_id'];
    $news->add_date = $_POST['add_date'];
    $news->save();
}

header('Location: ./');