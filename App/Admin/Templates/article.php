<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form action="article.php?upd=true" method="post">
    <input type="number" hidden name="id" value="<?php echo $singleNews->id; ?>">
    <h2>Заголовок</h2>
    <input type="text" name="title" required value="<?php echo $singleNews->title; ?>">
    <h2>Текст</h2>
    <textarea name="text" cols="30" rows="10" required><?php echo $singleNews->text; ?></textarea>
    <input type="submit" value="Обновить">
</form>
<a href="article.php?del=true&id=<?php echo $singleNews->id; ?>">Удалить новость</a>

<a href="index.php">Вернутся</a>

</body>
</html>