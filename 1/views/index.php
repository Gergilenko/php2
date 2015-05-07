<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link type="text/css" rel="stylesheet" href="./views/css/style.css">
</head>
<body>
    <div id="container">
        <h1>GALLERY</h1>
        <p> <?php include __DIR__ . './form.html'; ?> </p>
        <p>
        <?php foreach ($images as $image):
            echo "<div class='block'>";
            echo "<div class='inner'><img src='".$image['url']."'></div>";
            echo "<div class='title'>". $image['title']."</div>";
            echo "</div>";
          endforeach; ?>
        </p>

    </div>
</body>
</html>