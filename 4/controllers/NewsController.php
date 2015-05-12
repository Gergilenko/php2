<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 22:55
 */

class NewsController {

    public function actionAll() {
        $data = News::viewAll();
        $view = new View();
        $view->items = $data;
        $view->display('news/all.php');
    }

    public function actionOne() {
        if (empty($_GET['news_id'])) {
            header("Location: ./");
        }
        $data = News::viewOne($_GET['news_id']);
        $view = new View();
        $view->item = $data;
        $view->display('news/one.php');
    }

    public function actionAdd() {
        if (!empty($_POST['title']) && !empty($_POST['text'])) {

            $news = new News();
            $news->title = substr($_POST['title'], 0, 100);
            $news->text = $_POST['text'];
            $news->add();
            header('Location: ./');
        }
        $view = new View();
        $view->display('news/add.php');
    }

    public function actionDel() {
        if (!empty($_GET['news_id'])) {

            $news = new News();
            $news->news_id = $_GET['news_id'];
            $news->del();
        }
        header('Location: ./');
    }

    public function actionSave() {
        if (!empty($_POST)) {

            $news = new News();
            $news->title = substr($_POST['title'], 0, 100);
            $news->text = $_POST['text'];
            $news->news_id = $_POST['news_id'];
            $news->add_date = $_POST['add_date'];
            $news->save();
        }
        header('Location: ./');
    }

    public function actionEdit() {

        if (empty($_GET['news_id'])) {
            header("Location: ./");
        }
        $data = News::viewOne($_GET['news_id']);
        $view = new View();
        $view->item = $data;
        $view->display('news/edit.php');
    }

}