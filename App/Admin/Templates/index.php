<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php foreach ($data as $item) : ?>

    <h1><?php echo $item->title; ?></h1>
    <p><?php echo $item->text; ?></p>
    <a href="article.php?id=<?php echo $item->id; ?>">Редактировать новость</a>

<?php endforeach; ?>

<a href="article.php?create=true">Добавить новость</a>

</body>
</html>