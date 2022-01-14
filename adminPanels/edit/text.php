<?php
    session_start();
	include('..\connect.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <link href="../../css/style_button_link.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title>Редактирование конференции</title>
</head>
<?php
		include('headeredit.php');
		include('nav.php');	
		$result = mysqli_query ($connect, "SELECT * FROM `conferences` WHERE `ID_conf` = ".$_GET["id"]);
		$row=mysqli_fetch_assoc($result);
		
		
	?>
<body>
	<main class="page-products">
		<h1 class="h h--1">Конференция</h1>
		<div class="name_header_orgcom">
			<span>Дата конференции</span>
			<span>Название конференции</span>
			<span>Программка конференции</span>
		</div>
		<ul class="page-products__list">
		<?php
     
	 
	 
	  if(isset($_POST["ch_conf"]))
		{
			$namecon = $_POST["Name_conf"];
	  $date = $_POST["Date"];
	  
	  $playbill = $_POST["playbill"];
			
			$sql = "UPDATE `conferences` SET `Name_conf`= '$namecon', `date`='$date', `playbill`='$playbill' WHERE `ID_conf`=".$_GET["id"];
								mysqli_query($connect, $sql);	
								
								$result = mysqli_query ($connect, "SELECT * FROM `conferences` WHERE `ID_conf` = ".$_GET["id"]);
								$row=mysqli_fetch_assoc($result);
									echo  " <form action='' method='post' enctype='multipart/form-data' <div class= 'product-item page-products__item'>
					<input type='text' name='Date' class='product-item__field' value = '".$row["date"]."'> 
					<input type='text' name='Name_conf' class='product-item__field' value = '".$row["Name_conf"]."'>
					<p><a href = '".$row["playbill"]."'>Скачать<a></p> 
									<input type='file' name='program'><br>
									<input type='submit' name = 'ch_prog' value = 'поменять программку'/>
					<input type='submit' name = 'ch_conf' class = 'product-item__edit' value = ''/>
					</div> 
					</form>  ";
							}
							else{
								$result = mysqli_query ($connect, "SELECT * FROM `conferences` WHERE `ID_conf` = ".$_GET["id"]);
								$row=mysqli_fetch_assoc($result);
									echo  " <form action='' method='post' enctype='multipart/form-data' <div class= 'product-item page-products__item'>
									<input type='text' name='Date' class='product-item__field' value = '".$row["date"]."'> 
									<input type='text' name='Name_conf' class='product-item__field' value = '".$row["Name_conf"]."'>
									
									<p><a href = '".$row["playbill"]."'>Скачать<a></p> 
									<input type='file' name='program'><br>
									<input type='submit' name = 'ch_prog' value = 'поменять программку'/>
									<input type='submit' name = 'ch_conf' class = 'product-item__edit' value = ''/>
									</div> 
									</form>  ";
							}

							function translitText($str) 
							{
								$tr = array(
									"А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
									"Д"=>"D","Е"=>"E","Ё"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
									"Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
									"О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
									"У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
									"Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
									"Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
									"в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j",
									"з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
									"м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
									"с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
									"ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
									"ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
								);
								return strtr($str,$tr);
							}
							$path = __DIR__ . "$dir";
	if(isset($_POST["ch_prog"]))
	 {
     if(!empty($_FILES["program"]["name"])){
		//$dateKonf = date("Y.m.d",strtotime($_POST["date_conf"]));
		$input_name = 'program';
		//директория
		$dir = "../editplaybill/" ;
    	// Разрешенные расширения файлов.
    	$allow = array();
    	// Запрещенные расширения файлов.
    	$deny = array(
    	    	'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
    	    	'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
    	    	'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
    	);
		$path = __DIR__ . "$dir";
		if (isset($_FILES[$input_name])) {
			/*if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}*/
    	    if (!isset($_FILES[$input_name])) {
    	    	$error = 'Файлы не загружены.';
    	    } else {
    	    	$files = array();
    	    	$diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
    	    	if ($diff == 0) {
    	    		$files = array($_FILES[$input_name]);
    	    	} else {
    	    		foreach($_FILES[$input_name] as $k => $l) {
    	    			foreach($l as $i => $v) {
    	    				$files[$i][$k] = $v;
    	    			}
    	    		}		
    	    	}	
    	    	foreach ($files as $file) {
    	    		$error = $success = '';
    	    		// Проверим на ошибки загрузки.
    	    		if (!empty($file['error']) || empty($file['tmp_name'])) {
    	    			$error = 'Не удалось загрузить файл.';
    	    		} elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
    	    			$error = 'Не удалось загрузить файл.';
    	    		} else {
    	    			// Оставляем в имени файла только буквы, цифры и некоторые символы.
    	    			$pattern = "[^A-Za-zА-ЯЁа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
    	    			$name = mb_eregi_replace($pattern, '-', $file['name']);
    	    			$name = mb_ereg_replace('[-]+', '-', $name);
    	    			$parts = pathinfo($name);
					
    	    			if (empty($name) || empty($parts['extension'])) {
    	    				$error = 'Недопустимый тип файла';
    	    			} elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
    	    				$error = 'Недопустимый тип файла';
    	    			} elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
    	    				$error = 'Недопустимый тип файла';
    	    			} else {
    	    				// Перемещаем файл в директорию.
							$name = translitText($name); // преобразование в латинские символы
    	    				if (move_uploaded_file($file['tmp_name'], $path . $name)) {
								$dir = htmlspecialchars("/adminPanels/editplaybill/$name", ENT_QUOTES);
								$sql = "UPDATE `conferences` SET `playbill`= '$dir' WHERE `ID_conf`=".$_GET["id"];
								mysqli_query($connect, $sql);
    	    					$success = 'Файл «' . $name . '» успешно загружен.'.$ggwp;
    	    				} 
    	    			}
    	    		}
    	    	}
    	    }
		}
	}
}

						
    ?>
		</ul>
		<script>
			$(function() {
				$('#feedback').on('submit', function(e) {
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
	</main>
</body>

</html>
