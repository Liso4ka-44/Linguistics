<?php
include "connect.php";
if (isset($_POST["btn"])) {
    $pass = trim($_POST["password"]);
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
    mysqli_query($connect, "INSERT INTO `users`(`name_us`, `login`, `password`) VALUES ('" . $_POST['name'] . "','" . $_POST["login"] . "','$pass')");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/script.js" type="text/javascript"></script>
    <script src="/js/reg.js" type="text/javascript"></script>
    <title>Добавление пользователей</title>
</head>

<body>
    <?php
    include "navigation.php";
    ?>
    <main class="main">
        <div class="container">
            <div class="reg">
                <form action="#" method="post" class="reg__form">
                    <h1 class="reg__title">Регистрация</h1>
                    <span id="error_login" class="suc">Логин занят</span>
                    <input type="text" class="input" name="name" placeholder="Введите имя">
                    <input type="text" class="input" name="login" placeholder="Введите логин">
                    <input type="text" class="input" name="password" placeholder="Введите пароль">
                    <button name="btn" type="submit" class="reg__btn" disabled>Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </main>

</body>

</html>