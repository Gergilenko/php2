<?php
//Controller

require __DIR__ . './models/photo.php';

$images = Photo_getAll();

include __DIR__ . './views/index.php';