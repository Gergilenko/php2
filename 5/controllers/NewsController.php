<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 22:55
 */

class NewsController {

    public function actionAll() {

        $view = new View;
        $view->items = NewsModel::findAll();
        $view->display('news/all.php');
    }

    public function actionOne() {
        if (empty($_GET['news_id'])) {
            header("Location: ./");
        }
        $view = new View;
        $view->item = NewsModel::findOneByPk($_GET['news_id']);
        $view->display('news/one.php');
    }

    public function actionNew() {
        $view = new View;
        $view->display('news/new.php');
    }

    public function actionAdd() {
        if (!empty($_POST['title']) && !empty($_POST['text'])) {
            $news = new NewsModel;
            $news->title = substr($_POST['title'], 0, 100);
            $news->text = $_POST['text'];
            $news->add_date = date('Y-m-d');
            $news->save();
        }
        header('Location: ./');
    }

    public function actionEdit() {

        if (empty($_GET['news_id'])) {
            header("Location: ./");
        }
        $view = new View;
        $view->item = NewsModel::findOneByPk($_GET['news_id']);
        $view->display('news/edit.php');
    }

    public function actionSave() {

        if (!empty($_POST['news_id']) && isset($_POST['add_date'])) {
            if (isset($_POST['title']) && isset($_POST['text'])) {
                $news = new NewsModel;
                $news->add_date = $_POST['add_date'];
                $news->title = substr($_POST['title'], 0, 100);
                $news->text = $_POST['text'];
                $news->news_id = $_POST['news_id'];
                $news->save();
            }
        }
        header('Location: ./');
    }

    public function actionDel() {
        if (!empty($_GET['news_id'])) {
            $news = new NewsModel;
            $news->news_id = $_GET['news_id'];
            $news->delete();
        }
        header('Location: ./');
    }
}