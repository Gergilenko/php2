<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 15:33
 */

require_once __DIR__ . './../lib/Article.php';

class News extends Article {

    public $news_id;

    public function viewAll() {

        $sql = "SELECT news_id, title, text, add_date FROM news ORDER BY add_date DESC";
        return $this->db->sqlQuery($sql);
    }

    public function view() {

        $sql = "SELECT news_id, title, text, add_date FROM news WHERE news_id='" .$this->news_id. "'";
        return array_pop($this->db->sqlQuery($sql));
    }

    public function add() {

        $sql = "INSERT INTO news (title, text, add_date) VALUES ('" . $this->title . "', '" . $this->text . "', CURRENT_DATE())";
        return $this->db->sqlExec($sql);
    }

    public function save() {

        $sql = "UPDATE `news` SET
                            `add_date` =  '" . $this->add_date . "',
                            `text` =  '" . $this->text . "',
                            `title` =  '" . $this->title . "' WHERE `news_id`='" . $this->news_id . "'";
        return $this->db->sqlExec($sql);
    }

    public function delete() {

        $sql = "DELETE FROM `news` WHERE `news_id` = '" . $this->news_id . "'";
        return $this->db->sqlExec($sql);
    }

}