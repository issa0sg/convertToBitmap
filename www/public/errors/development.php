<?php

/**
 * @var $errno \reiatsu\ErrorHandler
 * @var $errstr \reiatsu\ErrorHandler
 * @var $errfile \reiatsu\ErrorHandler
 * @var $errline \reiatsu\ErrorHandler
 * 
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Development Error</title>
</head>
<body>
    <h1>Произошла ошебка!</h1>
    <p>Код ошибки: <?= $errno ?></p>
    <p>Текст ошибки: <?= $errstr ?></p>
    <p>Файл ошибки: <?= $errfile ?></p>
    <p>Строка ошибки: <?= $errline ?></p>    
</body>
</html>