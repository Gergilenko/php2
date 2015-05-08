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
            <table>
                <tr><td><input type="text" name="title" value="<?php echo $data['title']; ?>" required>
                <tr><td><input type="date" name="add_date" value="<?php echo $data['add_date']; ?>">
                <tr><td><textarea name="text" required> <?php echo $data['text']; ?> </textarea>
                        <input type="hidden" name="news_id" value="<?php echo $data['news_id']; ?>">
                <tr><td><input type="submit" value="Сохранить">
            </table>
        </form>

    </div>
</body>
</html>