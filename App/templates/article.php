<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<!--
Добавьте к моделям метод delete()
На базе реализованного вами кода сделайте простейшую (!) админ-панель новостей с функциями добавления,
удаления и редактирования новости.
-->


<h1><?php echo $news->title; ?></h1>
<p><?php echo $news->text; ?></p>
<p><?php echo $news->author->name; ?></p>
<a href="/?ctr=News&act=Default">На главную</a>

</body>
</html>

