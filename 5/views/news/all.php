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
    <form action="<?php $this->url('News/New'); ?>" method="post">
        <input type="submit" value="Добавить новость">
    </form>

    <?php foreach ($items as $obj): ?>
        <div class='block'>
            <div class='mhead'> <?php echo $obj->title; ?> </div>
            <p> <?php echo $obj->text; ?> </p>
            <div class='mfoot'> <?php echo $obj->add_date; ?> <a href='<?php $this->url('News/Del/'. $obj->news_id); ?>'>Удалить</a> <a href='<?php $this->url('News/Edit/'. $obj->news_id); ?>'>Править</a></div>
        </div>
    <?php endforeach; ?>

</div>
</body>
</html>