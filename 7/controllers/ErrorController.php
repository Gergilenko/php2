<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 15.05.2015
 * Time: 0:19
 */

class ErrorController {

    public $e;

    public function __construct(Exception $e) {
        $this->e = $e;
    }

    public function process() {
        $data['code'] = $this->e->getCode();
        $data['message'] = $this->e->getMessage();
        $data['file'] = $this->e->getFile();

        $log = new Log();
        $log->data = $data;
        $log->write();


        $template = 'error/' . $data['code'] . '.php';
        if (!file_exists(__DIR__ . '/../views/' . $template)) {
            $template = 'error/default.php';
        }
        $view = new View();
        $view->items = $data;
        $view->display($template);
    }
}