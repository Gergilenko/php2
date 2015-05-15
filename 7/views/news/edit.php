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
        <form action="<?php $this->url('news/save'); ?>" method="post">
            <p><input type="text" name="title" value="<?php echo $item->title; ?>" required></p>
            <p><textarea name="text" rows="10" wrap="soft" required><?php echo $item->text; ?></textarea></p>
            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
            <p><input type="date" name="add_date" value="<?php echo $item->add_date; ?>"></p>
            <p><input type="submit" value="Сохранить"></p>
        </form>
    </div>
</body>
</html>