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
    protected static $class;
    public $add_date;

    public function __construct() {
        $this->db = new Db();
    }

    public function viewAll() {
        $sql = "SELECT * FROM " . static::$table . " ORDER BY add_date DESC";
        return $this->db->queryAll($sql, static::$class);
    }

    public function viewOne($id) {

        $sql = "SELECT * FROM " . static::$table . " WHERE " . static::$table . "_id='" . $id . "'";
        return $this->db->queryOne($sql, static::$class);
    }

    abstract public function add();

    abstract public function save();

    abstract public function del();

}