<?php
include "connect.php";
if ($_POST["login1"]) {
    $check = false;
    $autoriz = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '222'");
    $autoriz = mysqli_fetch_assoc($autoriz);
    if (password_verify($_POST["pass"], $autoriz["password"])) {

        $check = true;
    }
    echo $check;
}
