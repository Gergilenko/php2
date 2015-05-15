<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title>NEWS</title>
    <link type="text/css" rel="stylesheet" href="<?php $this->url('views/css/style.css'); ?>">
</head>
<body>
<div id="container">
    <h1>NEWS</h1>
    <form action="<?php $this->url('news/add'); ?>" method="post">
        <p><input type="text" placeholder="Заголовок" name="title" required></p>
        <p><textarea name="text" placeholder="Текст новости..." rows="10" wrap="soft" required></textarea></p>
        <p><input type="submit" value="Добавить новость"></p>
    </form>
</div>
</body>
</html>