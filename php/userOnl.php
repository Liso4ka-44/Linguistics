<?php
include "connect.php";
if (isset($_POST["login"])) {
$mass = "";
$login_bd = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = " . $_POST["login"]);
$login_bd = mysqli_fetch_assoc($login_bd);
if (empty($login_bd)) {
$mass = "done";
} else {
$mass = "undone";
}
echo $mass;
}
