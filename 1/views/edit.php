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
        <form action="./save.php" method="post">
            <p><input type="text" name="title" value="<?php echo $data['title']; ?>" required></p>
            <p><textarea name="text" rows="10" wrap="soft" required> <?php echo $data['text']; ?> </textarea></p>
            <input type="hidden" name="news_id" value="<?php echo $data['news_id']; ?>">
            <p><input type="date" name="add_date" value="<?php echo $data['add_date']; ?>"></p>
            <p><input type="submit" value="Сохранить"></p>
        </form>
    </div>
</body>
</html>