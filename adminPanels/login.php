<?php
    session_start();
?>
<html>

<head>
	<meta charset="utf-8">
	<title>Авторизация</title>
</head>
<?php	include('header.php');?>
<script src="adminPanels\js\jquery-3.6.0.min.js"></script>

<body>
	<main class="page-authorization">
		<h1 class="h h--1">Авторизация</h1>
		<form class="custom-form" action="adminPanels\add\loginaut.php" method="post" id="log_us">
			<input type="text" class="custom-form__input" required="" name="login">
			<input type="password" class="custom-form__input" required="" name="password">
			<input class="button" type="submit" id="submit" name="autho_us" value="Войти в личный кабинет">
		</form>
	</main>
	<script>
		$(function() {
			$('#log_us').on('submit', function(e) {
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
					success: function(data) {
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
