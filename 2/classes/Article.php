<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 15:33
 */

require_once __DIR__ . './../classes/Db.php';

abstract class Article {

    protected $db;
    public $title;
    public $text;
    public $add_date;

    public function __construct() {
        $this->db = new Db();
    }

    abstract public function viewAll();

    abstract public function view();

    abstract public function add();

    abstract public function save();

    abstract public function delete();
}