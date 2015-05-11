<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 15:00
 */

require_once __DIR__ . './config.php';

class Db {
    private $link;

    public function __construct() {
        $this->link =  new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_BASE);
    }
    //method for SELECT queries
    public function sqlQuery($sql) {

        $result_set = $this->link->query($sql);

        $data = [];
        while($row = $result_set->fetch_assoc()) {
            $data[] = $row;
        }
        $result_set->close();

        return $data;
    }
    //method for INSERT, UPDATE, DELETE queries
    public function sqlExec($sql) {

        return $this->link->query($sql);
    }

    public function __destruct() {
        $this->link->close();
    }
}