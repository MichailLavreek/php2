<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<h1>Идет сохранение...</h1>
<?php

if (!empty($isEmptyId) && true === $isEmptyId) {
    echo '<h2>ID новости не найден</h2>';
    $isErr = true;
}

if (empty($isErr)) {
    echo '<h2>Сохранение успешно</h2>';
}

?>


<a href="index.php">Вернутся</a>

</body>
</html>