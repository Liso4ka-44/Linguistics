<?php session_start();
    $connect = mysqli_connect('127.0.0.1', 'root', '','Test_BD');

if( $connect == false )
{
    echo 'Не удалось подключиться к базе данных!<br>';
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset  "utf-8">
		<link href = "../css/css.css" rel="stylesheet " type="text/css">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet " type="text/css" />
       
  </head>
<body>

   <div class = "top_menu">
        <ul>
		   <li><a href = "../index.php">Главная</a></li>
		   <li><a href = "../php/catalog.php">Каталог</a>
         
 <ul>
          <li><a href = "../php/makeup.php">Макияж</a></li>
          <li><a href = "../php/care.php">Уход</a></li>
          <li><a href = "../php/hair.php">Волосы</a></li>
          <li><a href = "../php/accessories.php">Аксессуары</a></li>
		  <li><a href = "../php/baby.php">Детские товары</a></li>
         
</ul>
           <li><a href = "../php/Forum.php">Форум</a></li>
		   <li><a href = "../php/korzina.php">Корзина</a></li>
		   <li><a href = "../php/come.php">Войти</a></li>
		</ul>
		</div>