<?php
include "connect.php";
if (isset($_POST["btn"])) {
    $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
    mysqli_query($connect, "INSERT INTO `users`(`name_us`, `login`, `password`, `online`) VALUES ('" . $_POST['name'] . "','" . $_POST["log"] . "','$pass',0)");
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
                    <input type="text" class="input" name="name" placeholder="Введите имя">
                    <input type="text" class="input" name="log" placeholder="Введите логин">
                    <input type="text" class="input" name="pass" placeholder="Введите пароль">
                    <button name="btn" type="submit" class="reg__btn">Зарегистрироваться</button>
                </form>
                <div class="user">
                    <ul class="user__list">

                    </ul>
                </div>
            </div>
        </div>
    </main>

</body>

</html>