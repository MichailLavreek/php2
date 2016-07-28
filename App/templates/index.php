<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php foreach ($news as $new) : ?>

    <h1><?php echo $new->title; ?></h1>
    <p><?php echo $new->text; ?></p>
    <p><?php echo $new->author->name; ?></p>
    <a href="?act=DisplayOne&id=<?php echo $new->id; ?>">На страницу новости</a>

<?php endforeach; ?>
 
</body>
</html>