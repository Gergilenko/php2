<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 15.05.2015
 * Time: 0:19
 */

class ErrorController {

    public $exception;

    public function __construct(Exception $e) {
        $this->exception = $e;
    }

    public function run() {
        $data['code'] = $this->exception->getCode();
        $data['mes'] = $this->exception->getMessage();
        $data['file'] = $this->exception->getFile();

        $log = new Log();
        $log->data = $data;
        $log->write();

        $view = new View();
        $view->display('error/' . $data['code'] . '.php');
    }
}