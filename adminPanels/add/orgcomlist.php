<?php
    session_start();
    ob_start();
    include('connect.php');
    $query = "SELECT * FROM `сommittee`";
    $poisk = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
    <link href = "../css/style_button_link.css" rel = "stylesheet" type = "text/css">
  <title>Оргкомитет</title>
</head>
  <?
		include('header.php');
		include('nav.php');
	?>
<body>
<main class="page-products">
    <div class = "orgcom_insert">
        <h1 class="h h--1">Оргкомитет</h1>
        <form action="add\addorgcom.php" method="post" enctype="multipart/form-data" id="orgcom">
            <input type="text" class="custom-form__input" name="name_orgcom" placeholder = "ФИО"><br>
            <input type="file" name="Foto_orgcom" class="custom-form"><br>
            <input type="text" class="custom-form__input" name="url_orgcom" placeholder = "Ссылка"><br>
            <button class="button button_orgcom" type="submit" >Добавить</button>
        </form>
    </div>
    <div>
        <div class="name_header_orgcom">
            <span>Имя</span>
            <span>Фото</span>
            <span>Ссылка</span>
        </div>
    </div>
    <ul class="page-products__list">
  <? 
  if(isset($_POST["ch_conf"])){
      $_SESSION['id_per'] = $_POST["ch_conf"];
      header('Location: orgcomitet_update.php');
  }

  if(isset($_POST["del"])){
        for($i =0;$i<$_SESSION["count"];$i++){
        $idm = $_POST["del"];
        $result = mysqli_query($connect, "DELETE FROM `сommittee` WHERE `ID_per` = '$idm'");
        $query = "SELECT * FROM `сommittee`";
        $poisk = mysqli_query($connect, $query);
        }
    }
        ?>
	  <form action='' method='post' enctype='multipart/form-data' class = "form_ogr">
			<?
			 while(($row = mysqli_fetch_assoc($poisk)) != false){
        
				$_SESSION["ids"][$count] = $row["ID_per"];
				echo "<div class= 'blok_orgcom'>
                        <lable>".$row["name_per"]."</lable> 
                        <img src='".$row["photo_per"]."' name='photo_$count' style='height: 300px;'>
                        <lable>".$row["link_per"]."</lable>
                        <div class ''>
                            <button name = 'ch_conf' class = 'product-item__edit' value = '".$row["ID_per"]."'></button>
                            <button class='product-item__delete' name='del' value='".$row["ID_per"]."'></button>
                        </div>
                    </div>
					";
				$count++;  
			  }
			   $_SESSION["count"] = $count;
			?>
    </form>
    </ul> 

    <script>
		$(function(){
			$('#orgcom').on('submit', function(e){
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
</main>
</body>
</html>
