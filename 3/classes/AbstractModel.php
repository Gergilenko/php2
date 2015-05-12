<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 23:45
 */

abstract class AbstractModel {

    protected $db;
    public $add_date;

    public function __construct() {
        $this->db = new Db();
    }

    abstract public function viewAll();

    abstract public function viewOne();

    abstract public function add();

    abstract public function save();

    abstract public function del();

}