<?php
require __DIR__ . './models/photo.php';
require __DIR__ . './functions/file.php';

if (!empty($_POST)) {
    $data = [];
    $data['title'] = (!empty($_POST['title'])) ?  substr($_POST['title'], 0, 20) : '';

    if (!empty($_FILES)) {
        $result = File_upload('image');
        if ($result) {
            $data['url'] = $result;
        }
    }
    if (isset($data['url'])) {
        Photo_add($data);
    }
}

header('Location: ./');
