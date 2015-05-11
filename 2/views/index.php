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

        <?php foreach ($data as $value):
            echo "<div class='block'>";
            echo "<div class='mhead'>". $value['title']."</div>";
            echo "<p>".$value['text']."</p>";
            echo "<div class='mfoot'>".$value['add_date']." <a href='./del.php?news_id=" .$value['news_id']. "'>Удалить</a> <a href='./edit.php?news_id=" .$value['news_id']. "'>Править</a></div>";
            echo "</div>";
          endforeach; ?>

    </div>
</body>
</html>