<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 18:14
 */

require __DIR__ . './models/News.php';

if (!empty($_POST['title']) && !empty($_POST['text'])) {

    $news = new News();
    $news->title = substr($_POST['title'], 0, 100);
    $news->text = $_POST['text'];
    $news->add();

    header('Location: ./');
}
include __DIR__ . './views/add.php';
