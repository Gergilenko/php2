<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 12.05.2015
 * Time: 16:07
 */

namespace App\Classes;

class View {


    protected $data =[];

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key];
    }

    public function __isset($attr) {
        return isset($this->data[$attr]);
    }

    public function display($template) {
        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        include __DIR__ . '/../views/' . $template;
    }

    public function url($str) {
        echo SITE_ROOT . $str;
    }
}