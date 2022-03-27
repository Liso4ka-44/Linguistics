<?php
// Подключаем библиотеку PHPMailer
use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\SMTP;
use PHPMailer\src\Exception;

require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
// Создаем письмо
$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', '/phpmailer/language');
$yourEmail = 'liza-volokhova@yandex.ru'; // ваш email на яндексе
$password = '4955912721'; // ваш пароль к яндексу или пароль приложения

$name = $_POST["name"];
$email = $_POST["email"];
$text = $_POST["text"];
// настройки SMTP
$mail->Mailer = 'smtp';
$mail->Host = 'ssl://smtp.yandex.ru';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'Елизавета В.'; // ваш email - тот же что и в поле From:
$mail->Password = $password; // ваш пароль;

// формируем письмо

// от кого: это поле должно быть равно вашему email иначе будет ошибка
$mail->setFrom($yourEmail, $name);

// кому - получатель письма
$mail->addAddress($yourEmail, 'Елизавета Волохова'); // кому

$mail->Subject = 'Проверка'; // тема письма

$mail->msgHTML("<html><body>
<h1>Письмо с сайта</h1>
<p>" . $text . "</p>
<p> Email отправителя " . $email . "</p>
</html></body>");

if ($mail->send()) { // отправляем письмо
  echo 'Письмо отправлено!';
} else {
  echo 'Ошибка: ' . $mail->ErrorInfo;
}
exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
