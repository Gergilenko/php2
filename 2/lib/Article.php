<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 15:33
 */

abstract class Article {
    public $title;
    public $text;
    public $add_date;

    abstract public function viewAll();

    abstract public function view();

    abstract public function add();

    abstract public function save();

    abstract public function delete();
}