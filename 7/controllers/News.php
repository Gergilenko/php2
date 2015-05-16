<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 22:55
 */
namespace App\Controllers;

use App\Models\News as Model;

class News {

    public function actionAll() {

        $view = new \View;
        $view->items = Model::findAll();
        $view->display('news/all.php');
    }

    public function actionOne() {
        if (empty($_GET['id'])) {
            header('Location: ' . SITE_ROOT);
        }
        $view = new \View;
        $view->item = Model::findOneByPk($_GET['id']);
        if (empty($view->item)) {
            throw new \Exception('ActionOne: Страница не найдена по ID: ' . $_GET['id'], 404);
        }
        $view->display('news/one.php');
    }

    public function actionNew() {
        $view = new \View;
        $view->display('news/new.php');
    }

    public function actionAdd() {
        if (!empty($_POST['title']) && !empty($_POST['text'])) {
            $news = new Model;
            $news->title = substr($_POST['title'], 0, 100);
            $news->text = $_POST['text'];
            $news->add_date = date('Y-m-d');
            $news->save();

            $mail = new \PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAutoTLS = false;
            $mail->Host       = 'smtp.yandex.ru';
            $mail->Port       = '465';
            $mail->Username   = 'wmz795@yandex.ru';
            $mail->Password   = 'M%g7KtGy';
            $mail->CharSet  = 'utf-8';
            $mail->AddReplyTo('wmz795@yandex.ru', 'HugoBoss');
            $mail->AddAddress('gergilenko@gmail.com');                //кому письмо
            $mail->SetFrom('wmz795@yandex.ru', 'HugoBoss'); //от кого (желательно указывать свой реальный e-mail на используемом SMTP сервере
            $mail->Subject = htmlspecialchars('Новость добавлена!');
            $mail->MsgHTML('На сайте NEWS вставлена новая новость: <a href="http://php2.local/7/news/one/' .$news->id . '">' . $news->title . "</a>");
            $mail->Send();

        }
        header('Location: ' . SITE_ROOT);
    }

    public function actionEdit() {

        if (empty($_GET['id'])) {
            header('Location: ' . SITE_ROOT);
        }
        $view = new \View;
        $view->item = Model::findOneByPk($_GET['id']);
        if (empty($view->item)) {
            throw new \Exception('ActionEdit: Страница не найдена по ID: ' . $_GET['id'], 404);
        }
        $view->display('news/edit.php');
    }

    public function actionSave() {

        if (!empty($_POST['id']) && isset($_POST['add_date'])) {
            if (isset($_POST['title']) && isset($_POST['text'])) {
                $news = new Model;
                $news->add_date = $_POST['add_date'];
                $news->title = substr($_POST['title'], 0, 100);
                $news->text = $_POST['text'];
                $news->id = $_POST['id'];
                $news->save();
            }
        }
        header('Location: ' . SITE_ROOT);
    }

    public function actionDel() {
        if (!empty($_GET['id'])) {
            $news = new Model;
            $news->id = $_GET['id'];
            $news->delete();
        }
        header('Location: ' . SITE_ROOT);
    }
}