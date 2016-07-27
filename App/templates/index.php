<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php foreach ($data as $item) : ?>

    <h1><?php echo $item->title; ?></h1>
    <p><?php echo $item->text; ?></p>
    <a href="/App/Controllers/article.php?id=<?php echo $item->id; ?>">На страницу новости</a>

<?php endforeach; ?>

</body>
</html>