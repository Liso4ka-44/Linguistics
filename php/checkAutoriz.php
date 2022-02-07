<?php
include "connect.php";
if ($_POST["login"]) {
    $autoriz = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = " . $_POST["login"]);
    $autoriz = mysqli_fetch_assoc($autoriz);
    if (password_verify($_POST["pass"], $autoriz["password"])) {
        $_SESSION["user"] = $autoriz;
        mysqli_query($connect, "UPDATE `users` SET `online`= true WHERE `ID_user` =" . $_SESSION["user"]["ID_user"]);

        $check = true;
    } else {
        $check = false;
    }
    echo $check;
}
