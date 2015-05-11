<?php
//Model

require_once __DIR__ . './../functions/sql.php';

function News_getAll() {

    $sql = "SELECT news_id, title, text, add_date FROM news ORDER BY add_date DESC";
    return sqlQuery($sql);
}

function News_getById($news_id) {

    $sql = "SELECT news_id, title, text, add_date FROM news WHERE news_id='" .$news_id. "'";
    return array_pop(sqlQuery($sql));
}

function News_add($data) {

    $sql = "INSERT INTO news (title, text, add_date) VALUES ('" . $data['title'] . "', '" . $data['text'] . "', CURRENT_DATE())";
    return sqlExec($sql);
}

function News_save($data) {

    $sql = "UPDATE `news` SET
                            `add_date` =  '" . $data['add_date'] . "',
                            `text` =  '" . $data['text'] . "',
                            `title` =  '" . $data['title'] . "' WHERE `news_id`='" . $data['news_id'] . "'";
    return sqlExec($sql);
}

function News_delete($news_id) {

    $sql = "DELETE FROM `news` WHERE `news_id` = '" . $news_id . "'";
    return sqlExec($sql);
}