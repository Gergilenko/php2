<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 12.05.2015
 * Time: 16:07
 */

class View
    implements Iterator {

    private $position = 0;

    public $data =[];

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key];
    }

    public function display($template) {

        foreach ($this->data as $key => $value) {
            $$key = $value;
        }
        include __DIR__ . './../views/' . $template;
    }

    //Iterator realisation
    function rewind() {
        reset($this->data);
    }

    function valid() {
        return isset($this->data[key($this->data)]);
    }

    function current() {
        return current($this->data);
    }

    function key() {
        return key($this->data);
    }

    function next() {
        next($this->data);
    }



}