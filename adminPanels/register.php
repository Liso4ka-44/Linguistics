<?php
session_start();
if($_SESSION['aut']!='true'){
   echo"<script>document.location.href='index.php';</script>";
   exit();
 }
?>

<html>
<head>
  <meta charset="utf-8">
  <title>Регистрация пользователя</title>
	<link rel="stylesheet" href="../css/style_button_link.css">
</head>
<?php
		include('header.php');
		include('nav.php');
	?>
	<body>
	<main class="page-authorization">
	  	<h1 class="h h--1">Регистрация</h1>
	  		<form class="custom-form" action="add/Add_All.php?add=register" method="post" id="reg_us">
                <input type="text" class="custom-form__input" required="" name="name_us" placeholder = "Имя">
	  			<input type="text" class="custom-form__input" required="" name="login" placeholder = "Логин">
	  			<input type="password" class="custom-form__input" required="" name="password" placeholder = "Пароль">
	  			<input class="button" type="submit"  id = "submit" name = "autho_us" value="Зарегистрировать">
	  		</form>
		</main>
        <script>
	        $(function(){
	        	$('#reg_us').on('submit', function(e){
	        	  e.preventDefault();
	        	    var $that = $(this),
	        	    formData = new FormData($that.get(0)); 
	        	    $.ajax({
	        		    url: $that.attr('action'),
	        		    cache: false,
	        		    type: $that.attr('method'),
	        		    contentType: false, 
	        		    processData: false, 
	        		    data: formData,
	        		    dataType: 'json',
	        		    success: function(data){
	        		    	data.forEach(function(msg) {
	        		    		$('#result').append(msg);
	        		    	});
	        		    }
	        	  });				
	        	});
	        });
	    </script>
	</body>
</html>
