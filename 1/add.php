<?php
require __DIR__ . './models/news.php';

if (!empty($_POST['title']) && !empty($_POST['text'])) {

    $data = [];
    $data['title'] = substr($_POST['title'], 0, 100);
    $data['text'] = $_POST['text'];

    News_add($data);

    header('Location: ./');
}
include __DIR__ . './views/add.php';

