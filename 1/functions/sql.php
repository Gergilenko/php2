<?php

function sqlConnect() {
    return new mysqli('localhost', 'root', '', 'shp');
}

//function for SELECT queries
function sqlQuery($sql) {

    $db = sqlConnect();
    $result_set = $db->query($sql);

    $data = [];
    while($row = $result_set->fetch_assoc()) {
        $data[] = $row;
    }
    $result_set->close();

    return $data;
}

//function for INSERT, UPDATE, DELETE queries
function sqlExec($sql) {
    $db = sqlConnect();
    return $db->query($sql);
}