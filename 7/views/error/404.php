<?php header('HTTP/1.0 404 Not Found'); ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>NEWS</title>
    <link type="text/css" rel="stylesheet" href="<?php $this->url('views/css/style.css'); ?>">
</head>
<body>
<div id="container">
    <h1>Страница не найдена.</h1>
    <br>
    <div class='block'>
        <div class='mhead'>Код ошибки: <b>404</b></div>
        <p>Вы запросили несуществующую страницу.</p>
    </div>
</div>
</body>
</html>