<?php
include "connect.php";
if ($_POST["login1"]) {
    $autoriz = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '" . $_POST["login1"] . "'");
    $row = mysqli_fetch_assoc($autoriz);
    $pass = $_POST["pass"];
    if (password_verify($pass, $row['password'])) {
        echo 'Пароль правильный!';
    } else {
        echo 'Пароль неправильный.';
    }
}
