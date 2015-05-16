<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>NEWS</title>
    <link type="text/css" rel="stylesheet" href="<?php $this->url('views/css/style.css'); ?>">
</head>
<body>
<div id="container">
    <h1>Ошибка.</h1>
    <br>
    <div class='block'>
        <div class='mhead'>Код ошибки: <b><?php echo $this->items['code']; ?></b></div>
        <p><?php echo $this->items['message']; ?></p>
        <p><?php echo $this->items['file']; ?></p>
    </div>
</div>
</body>
</html>
