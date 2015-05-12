<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 12.05.2015
 * Time: 16:07
 */

class View {


    protected $data =[];
    /*
    public function __construct($data) {
        $this->pageData = $data;
    }*/

    public function assign($name, $value) {
        $this->data[$name] = $value;
    }

    public function display($template) {

        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        include __DIR__ . './../views/' . $template;
    }

}