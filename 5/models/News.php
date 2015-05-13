<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 11.05.2015
 * Time: 23:42
 */

//Model

class News extends AbstractModel {

    protected static $table = 'news';
    public $news_id;
    public $title;
    public $text;

    public function save() {

        if (empty($this->news_id)) {
            $sql = "INSERT INTO news (title, text, add_date) VALUES ('" . $this->title . "', '" . $this->text . "', CURRENT_DATE())";
        }
        else {
            $sql = "UPDATE `news` SET
                            `add_date` =  '" . $this->add_date . "',
                            `text` =  '" . $this->text . "',
                            `title` =  '" . $this->title . "' WHERE `news_id`='" . $this->news_id . "'";
        }
        return $this->db->queryExec($sql);
    }

    public function del() {

        $sql = "DELETE FROM `news` WHERE `news_id` = '" . $this->news_id . "'";
        return $this->db->queryExec($sql);
    }
}