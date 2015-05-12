<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>NEWS</title>
    <link type="text/css" rel="stylesheet" href="./views/css/style.css">
</head>
<body>
<div id="container">
    <h1>NEWS</h1>
    <br>
        <div class='block'>
            <div class='mhead'> <?php echo $item->title; ?> </div>
            <p> <?php echo $item->text; ?> </p>
            <div class='mfoot'> <?php echo $item->add_date; ?> <a href='./index.php?ctrl=News&act=Del&news_id=<?php echo $item->news_id; ?>'>Удалить</a> <a href='./index.php?ctrl=News&act=Edit&news_id=<?php echo $item->news_id; ?>'>Править</a></div>
        </div>
</div>
</body>
</html>