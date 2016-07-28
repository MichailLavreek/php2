<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php foreach ($news as $article) : ?>

    <h1><?php echo $article->title; ?></h1>
    <p><?php echo $article->text; ?></p>
    <a href="?act=Edit&id=<?php echo $article->id; ?>">Редактировать новость</a>

<?php endforeach; ?>

<a href="article.php?create=true">Добавить новость</a>

</body>
</html>