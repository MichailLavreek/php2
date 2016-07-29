<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<h1>
    <?php
    
    echo $errorMessage;

    var_dump($exception);

    echo date('y-m-d  G:i:s') . ' = ' . $exception->getFile() . ' \n' . $exception->getMessage();
    ?>
</h1>



<a href="/">На главную</a>

</body>
</html>