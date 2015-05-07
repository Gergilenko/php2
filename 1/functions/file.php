<?php

function File_upload($field) {
    if (empty($_FILES)) {
        return false;
    }
    if (0 != $_FILES[$field]['error']) {
        return false;
    }

    $white_list = [".jpg", ".png", ".gif"];

    foreach ($white_list as $item) {
        if(preg_match("/$item\$/i", $_FILES[$field]['name'])) {
            $allowed = true;
            break;
        }
        else $allowed = false;
    }

    if (!$allowed) {
        return false;
    }

    $tmp_name = $_FILES[$field]['tmp_name'];
    $url = './img/' . $_FILES[$field]['name'];

    if (is_uploaded_file($tmp_name)) {
        $uploaded = move_uploaded_file($tmp_name, __DIR__ . './.' . $url);
        if ($uploaded) {
            return $url;
        }
    }
    return false;
}