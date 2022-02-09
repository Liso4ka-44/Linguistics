<?php
include "php/connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/autoriz.js" type="text/javascript" defer></script>
    <title>Авторизация</title>
</head>

<body class="back">
    <div class="authorization">
        <div class="authorization__body">
            <h1>Язык. Культура. Перевод</h1>
            <h2>Панель администратора</h2>
            <form method="post" class="authorization__form">
                <h3>Авторизация</h3>
                <div class="error__autoriz">
                </div>
                <label class="authorization__input">
                    <img src="/img/icon/username.svg" alt="">
                    <input type="text" name="authorization__login" class="input" placeholder="Логин...">
                </label>
                <label class="authorization__input">
                    <img src="/img/icon/password.svg" alt="">
                    <input type="password" name="authorization__password" class="input" placeholder="Пароль...">
                </label>

                <div class="authorization__footer">
                    <label class="check">
                        <input type="checkbox" name="remember" class="check__input">
                        <span class="check__box"></span>
                        Запомнить меня
                    </label>
                    <button class="authorization__btn" type="button">Войти</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>