<?php

require_once __DIR__ . './../functions/sql.php';

function Photo_getAll() {

    $sql = "SELECT title, url FROM images_8";
    return sqlQuery($sql);
}

function Photo_add($data) {

    $sql = "INSERT INTO images_8 (title, url) VALUES ('" . $data['title'] . "', '" . $data['url'] . "')";
    return sqlExec($sql);
}