<?php
    session_start();
    include('..\connect.php');
	$result = mysqli_query ($connect, "SELECT * FROM `conferences` WHERE `ID_conf` = ".$_GET["id"]);
	$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
    <link href = "../../css/style_button_link.css" rel = "stylesheet" type="text/css">
  <title>Редактирование информации</title>
</head>
<?php
		include('headeredit.php');
		include('nav.php');
	?>
	<body>
	<main class="page-products">
  		<h1 class="h h--1">Конференция</h1>
  		<div class="page-products__header">
    		<span class="page-products__header-field">Информация о конференции</span>
  		</div>
  		<ul class="page-products__list">
			<li>
				<form action='..\update\ALL_EDIT.php?update=inf&id=<?=$_GET["id"]?>' method='post' enctype='multipart/form-data' id="infoupdate">
				 	<div class= 'product-item page-products__item nado'>
                        <textarea  class="custom-form__input" name="info_announcement" id = "info_konf"> <?=$row["info"]?></textarea>
						<input type='submit' name = 'ch_conf' class = 'product-item__edit' value = ''>
					</div> 
				</form>
			</li>
    	</ul> 
    	<script>
			$(function() {
				$('#infoupdate').on('submit', function(e) {
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
					//window.location.reload();
				});
			});
		</script>
	</main>
	</body>
</html>