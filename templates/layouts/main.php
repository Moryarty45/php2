<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="/css/my.css" rel="stylesheet">
</head>
<body>
<?php if ($auth):?>
    Добро пожаловать <?=$username?> <a href="/auth/logout/"> [Выход]</a>
<?php else:?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        <input type="submit" name="submit" value="Войти">
        запомнить? <input type='checkbox' name='savePass'>
    </form>
<?php endif;?><br>
<?=$menu?>
<?=$content?>
<script src="/js/api.js"></script>
</body>
</html>