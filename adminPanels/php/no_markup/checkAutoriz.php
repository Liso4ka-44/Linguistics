<?php
include "../connect.php";
if ($_POST["pass"]) {
    $autoriz = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '" . $_POST["login1"] . "'");
    $row = mysqli_fetch_assoc($autoriz);
    $hash1 = $row["password"];
    if (password_verify($_POST['pass'], $row['password'])) {
        echo true;
    } else {
        echo false;
    }
}
