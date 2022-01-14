<?php
if($_POST['login']!=''&&$_POST['password']!=''){
    include "../connect.php";
    $login = $_POST['login'];
    $query = "SELECT * FROM `users` WHERE `login` = '$login'";
    $poisk = mysqli_query($connect, $query);
    $rezult = mysqli_fetch_assoc($poisk);
    if ($rezult !=[]){
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $login = trim($login);
    $login = htmlspecialchars($login);
     //password 
    $name_us =  htmlspecialchars($_POST['name_us']);
    $password = $_POST['password'];
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);
    //Хэшируем пароль 60 символов
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //проверка на наличие логина в бд
     $query = "INSERT INTO `users`( `name_us`, `login`, `password`) VALUES ('$name_us',' $login','$password')";
	 $poisk = mysqli_query($connect, $query);
    if ($poisk=='TRUE'){
        echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.";
    }else{
        echo "Ошибка! ";
    }
    $_POST=[];
}