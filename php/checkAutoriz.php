<?php
include "connect.php";
if ($_POST["pass"]) {
    $autoriz = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '" . $_POST["login1"] . "'");
    $row = mysqli_fetch_assoc($autoriz);
    $pass = (string) $_POST['pass'];
    $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
    $hash1 = $row["password"];
    if (password_verify($_POST["pass"], $hash1)) {
        echo 'Пароль правильный!';
    } else {
        echo $hash1;
    }
}
//rasmuslerdorf