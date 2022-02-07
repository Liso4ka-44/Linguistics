<?php
include "connect.php";
$listUser = array();
$count = 0;
$userOnl = mysqli_query($connect, "SELECT * FROM `users`");
while (($row = mysqli_fetch_assoc($userOnl)) != false) {
    array_push($listUser, $row["name_us"] . " " . $row["online"]);
    $count++;
}
echo json_encode($listUser);
