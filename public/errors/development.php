<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ошибка</title>
</head>
<body>
    <h2>Произошла ошибка</h2>
    <br>
    <p><b>Код ошибки: &nbsp;</b><?= $errno ?></p>
    <p><b>Текст ошиибки: &nbsp;</b><?= $errstr ?></p>
    <p><b>Файл, в котором произошла ошибка: &nbsp;</b><?= $errfile ?></p>
    <p><b>Строка, в которой произошла ошибка: &nbsp;</b><?= $errline ?></p>
</body>
</html>