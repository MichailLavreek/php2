<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php foreach ($users as $user) : ?>

    <h1><?php echo $user->name; ?></h1>
    <p><?php echo $user->email; ?></p>
    <a href="/App/Controllers/article.php?id=<?php echo $user->id; ?>">На страницу новости</a>

<?php endforeach; ?>
 
</body>
</html>