<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 23:45
 */

/**
 * Class AbstractModel
 *
 * The ID field of tables must be like this: table_id
 * Example: if table name is 'blogs' the name of id column is 'blogs_id'
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
        $class = get_called_class();
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table;
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id) {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . static::$table . '_id=:id';
        //return first row
        return $db->query($sql, [':id' => $id])[0];
    }

    public function findByColumn($column, $value) {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' .$column. '=:value';
        $db = new Db;
        $db->setClassName($class);
        return $db->query($sql, [':value' => $value]);
    }

    public function save() {
        $id = static::$table . '_id';
        if (!isset($this->$id)) {
            $this->$id = $this->insert();
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
    }

    protected function update() {
        $id = static::$table . '_id';
        //columns of table
        $cols = array_keys($this->data);
        // replace $this->data keys with ':key'
        $data =[];
        $sets = [];
        foreach ($cols as $col) {
            $sets[] = $col . '=:' . $col;
            $data[':' . $col] = $this->data[$col];
        }
        //generating query: UPDATE table SET col1=:col1, col2=:col2 WHERE table_id=:id
        $sql = 'UPDATE ' . static::$table . '
                SET ' . implode(', ', $sets) . '
                WHERE ' . $id . '=:' . $id;
        $db = new Db;
        $db->exec($sql, $data);
    }

    public function delete() {
        $id = static::$table . '_id';
        $sql = 'DELETE FROM ' . static::$table . ' WHERE ' . $id . '=:id';
        $db = new Db;
        $db->exec($sql, [':id' => $this->$id]);
    }
}