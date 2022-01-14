<?php
    session_start();
	if($_SESSION['aut'] == "true"){
		header('Location: conflist.php');
	}
	include('header.php');
	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <script src='\js\jquery-3.6.0.min.js'></script>
		<script src = "js/autoriz.js" type = "text/javascript"></script>
    </head>
    <body>
        <main class='page-authorization' id='result'>
            <h1 class='h h--1'>Авторизация</h1>
            <div>
                <form class='custom-form' action='\adminPanels\loginaut.php' method='post' id='log_us'>
                    <input type='text' class='custom-form__input' required name='login' id = "login" placeholder = "логин">
                    <input type='password' class='custom-form__input' required name='password' id = "password" placeholder = "пароль">
                    <input class='button' type='submit' id='submit' name='autho_us' value='Войти в личный кабинет'>
                </form>
            </div>
		</main>
    </body>
</html>
		
		