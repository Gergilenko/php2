<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>NEWS</title>
    <link type="text/css" rel="stylesheet" href="<?php $this->url('views/css/style.css'); ?>">
</head>
<body>
<div id="container">
    <h1>NEWS</h1>
    <br>
        <div class='block'>
            <div class='mhead'> <?php echo $item->title; ?> </div>
            <p> <?php echo $item->text; ?> </p>
            <div class='mfoot'> <?php echo $item->add_date; ?> <a href='<?php $this->url('news/del/' . $item->id); ?>'>Удалить</a> <a href='<?php $this->url('news/edit/' . $item->id); ?>'>Править</a></div>
        </div>
</div>
</body>
</html>