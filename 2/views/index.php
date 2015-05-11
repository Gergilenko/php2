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
         <form action="./add.php" method="post">
             <input type="submit" value="Добавить новость">
         </form>

        <?php foreach ($data as $value): ?>
            <div class='block'>
                <div class='mhead'> <?php echo $value['title']; ?> </div>
                <p> <?php echo $value['text']; ?> </p>
                <div class='mfoot'> <?php echo $value['add_date']; ?> <a href='./del.php?news_id=<?php echo $value['news_id']; ?>'>Удалить</a> <a href='./edit.php?news_id=<?php echo $value['news_id']; ?>'>Править</a></div>
            </div>
        <?php endforeach; ?>

    </div>
</body>
</html>