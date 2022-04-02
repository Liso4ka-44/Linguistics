<?php
$connect = mysqli_connect("127.0.0.1", "root", "", "conference");
if ($connect == false) {
    echo "Подключение к Базе Данных отсутствует";
    exit();
}
