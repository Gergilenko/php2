<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 23:45
 */

namespace App\Classes;

/**
 * Class AbstractModel
 *
 *
 */

abstract class AbstractModel {

    protected static $table;
    protected $data;

    public function __set($key, $value) {
        $this->data[$key] = $value;
    }

    public function __get($key) {
        return $this->data[$key];
    }

    public function __isset($attr) {
        return isset($this->data[$attr]);
    }

    public static function findAll() {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table;
        $db->setClassName(get_called_class());
        return $db->query($sql);
    }

    public static function findOneByPk($id) {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

        $result = $db->query($sql, [':id' => $id]);
        if (!empty($result)) {
            //return first row
            return $result[0];
        }
        return false;
    }

    public static function findByColumn($column, $value) {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' .$column. '=:value';
        $db = new Db;
        $db->setClassName(get_called_class());
        $result = $db->query($sql, [':value' => $value]);
        if (!empty($result)) {
            return $result;
        }
        return false;
    }

    public function save() {
        if (!isset($this->id)) {
            $this->id = $this->insert();
        }
        else {
            $this->update();
        }
    }

    protected function insert() {
        //columns of table
        $cols = array_keys($this->data);
        // refactor $this->data keys with ':key'
        $data =[];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }
        //generating query: INSERT INTO table (col1, col2) VALUES (:col1. :col2)
        $sql = 'INSERT INTO ' . static::$table . '
                 (' . implode(', ', $cols) . ')
                 VALUES
                 (' . implode(', ', array_keys($data)) . ')';
        $db = new Db;
        if ($db->exec($sql, $data)) {
            return $db->lastInsertId();
        }
        return false;
    }

    protected function update() {
        $data =[];
        $cols = [];
        foreach ($this->data as $col => $value) {
            $data[':' . $col] = $value;
            if ($col == 'id') {
                continue;
            }
            $cols[] = $col . '=:' . $col;
        }
        //generating query: UPDATE table SET col1=:col1, col2=:col2 WHERE id=:id
        $sql = 'UPDATE ' . static::$table . '
                SET ' . implode(', ', $cols) . '
                WHERE id=:id';
        $db = new Db;
        $db->exec($sql, $data);
    }

    public function delete() {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new Db;
        $db->exec($sql, [':id' => $this->id]);
    }
}