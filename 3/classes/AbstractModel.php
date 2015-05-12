<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 23:45
 */

abstract class AbstractModel {

    protected $db;
    protected static $table;
    public $add_date;

    public function __construct() {
        $this->db = new Db();
    }
    //will be static method later...
    public function viewAll() {
        $sql = "SELECT * FROM " . static::$table . " ORDER BY add_date DESC";
        return $this->db->queryAll($sql, get_called_class());
    }

    public function viewOne($id) {

        $sql = "SELECT * FROM " . static::$table . " WHERE " . static::$table . "_id='" . $id . "'";
        return $this->db->queryOne($sql, get_called_class());
    }

    abstract public function add();

    abstract public function save();

    abstract public function del();

}