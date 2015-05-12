<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 22:48
 */

require_once __DIR__ . './../config.php';

class Db {

    private $link;

    public function __construct() {
        $this->link =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_BASE);
        $this->link->query("SET NAMES 'utf8'");
    }

    //method for SELECT whole table
    public function queryAll($sql, $class = 'stdClass') {

        $result_set = $this->link->query($sql);
        if (false === $result_set) {
            return false;
        }
        $data = [];
        while($obj = $result_set->fetch_object($class)) {
            $data[] = $obj;
        }
        $result_set->close();

        return $data;
    }


    // Return first row from table
    public function queryOne($sql, $class = 'stdClass') {

        return $this->queryAll($sql, $class)[0];
    }

    //method for INSERT, UPDATE, DELETE queries
    public function queryExec($sql) {

        return $this->link->query($sql);
    }


    public function __destruct() {
        $this->link->close();
    }
}