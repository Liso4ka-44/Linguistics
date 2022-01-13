<?php
// Подключаем библиотеку PHPMailer
use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\SMTP;
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Создаем письмо
$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail -> setLanguage('ru','/phpmailer/language');
$yourEmail = 's.truskalo@yandex.ru'; // ваш email на яндексе
$password = 'aen,jk26repz'; // ваш пароль к яндексу или пароль приложения

$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["text"];
// настройки SMTP
$mail->Mailer = 'smtp';
$mail->Host = 'ssl://smtp.yandex.ru';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = $yourEmail; // ваш email - тот же что и в поле From:
$mail->Password = $password; // ваш пароль;

// формируем письмо

// от кого: это поле должно быть равно вашему email иначе будет ошибка
$mail->setFrom($yourEmail, $name);

// кому - получатель письма
$mail->addAddress($yourEmail, 'Семён Трускало'); // кому

$mail->Subject = 'Проверка'; // тема письма

$mail->msgHTML("<html><body>
<h1>Письмо с сайта</h1>
<p>".$text."</p>
<p> Email отправителя ".$email."</p>
</html></body>");

if ($mail->send()) { // отправляем письмо
  echo 'Письмо отправлено!';
} else {
  echo 'Ошибка: ' . $mail->ErrorInfo;
}
exit("<meta http-equiv='refresh' content='0; url= /index.php'>"); 
?>