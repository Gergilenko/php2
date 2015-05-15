<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 15.05.2015
 * Time: 20:16
 */

namespace App\Controllers;

use App\Models\News;


class Json {

    public function actionGet() {
        $content = file_get_contents(__DIR__ . '/../test.json');
        //$obj = json_decode($content);
        $obj = unserialize($content);
        var_dump($obj);
    }

    public function actionPut() {
        $news = new News();
        $news->title = 'titl22';
        $news->text = "blsblabla";
        //$content = json_encode(News::findOneByPk($_GET['id']));
        $content = serialize($news);
        file_put_contents(__DIR__ . '/../test.json', $content);
    }

}