<?php

require __DIR__ . './models/news.php';

if (!empty($_POST)) {

    $data = [];
    $data['news_id'] = $_POST['news_id'];
    $data['title'] = substr($_POST['title'], 0, 100);
    $data['add_date'] = $_POST['add_date'];
    $data['text'] = $_POST['text'];

    News_save($data);

}

header('Location: ./');