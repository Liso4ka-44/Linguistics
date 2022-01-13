<?php
session_start();
if($_SESSION['aut']!='true'){
   echo"<script>document.location.href='index.php';</script>";
   exit();
 }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////								Переменные											///////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$connect = mysqli_connect("127.0.0.1","root","","mgimo");
if( !empty($_POST["date_conf"]) && $_POST["date_conf"]!="" && !empty($_POST['Name_conf']) && $_POST['Name_conf']!=""  && !empty($_POST['info']) && $_POST['info']!=""){
//дата
	$dateKonf = date("Y/m/d",strtotime($_POST["date_conf"]));
//Формат фото
	$format ="";
//текст к конфиренции
	$info = $_POST['info'];
//имя конфиренции
	$Name_conf = $_POST['Name_conf'];

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////								формирование года для поиска id к бд											///////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	

	$dateComps = date_parse($dateKonf);
	$year = (string) $dateComps['year'];
	$query = "SELECT `ID_year` FROM `years` WHERE `year` ='$year'";
	$poisk = mysqli_query($connect, $query);
	$rezult = mysqli_fetch_assoc($poisk);
	$idyear = (int) $rezult['ID_year'];
	
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////								Запись конфы											///////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	$sql = "INSERT INTO `conferences` (`Name_conf`, `ID_year`, `date`, `info`) values ('$Name_conf',$idyear,'$dateKonf' ,'$info')";
	mysqli_query($connect, $sql);


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////							Поиск последней новой записи											///////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	$query = "SELECT MAX(`ID_conf`) FROM `conferences`";
	$poisk = mysqli_query($connect, $query);
	$rezult = mysqli_fetch_assoc($poisk);
	$lastKonfID = (int) $rezult["MAX(`ID_conf`)"];
	
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////								файл											///////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if(!empty($_FILES["file"]["name"])){
		$dateKonf = date("d.m.Y",strtotime($_POST["date_conf"]));
		$input_name = 'file';
		//директория
		$dir = './konf/'.$dateKonf.'/' ;
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
			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}
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
    	    			$pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
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
    	    				if (move_uploaded_file($file['tmp_name'], $path . $name)) {
								$dir = htmlspecialchars("$dir"."$name", ENT_QUOTES);
								$sql = "INSERT INTO `documents`(`Name_documents`, `Road_to_documents`, `ID_conf`) VALUES ('$name','$dir',$lastKonfID)";
								mysqli_query($connect, $sql);
    	    					$success = 'Файл «' . $name . '» успешно загружен.'.$ggwp;
    	    				} else {
    	    					$error = 'Не удалось загрузить файл.';
    	    				}
    	    			}
    	    		}
    	    		if (!empty($success)) {
    	    			$data[] = '<p style="color: green">' . $success . '</p>';  
    	    		}
    	    		if (!empty($error)) {
    	    			$data[] = '<p style="color: red">' . $error . '</p>';  
    	    		}
    	    	}
    	    }
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////								Фото											///////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(!empty($_FILES['image']['name'])){
	$dir = './konf/'.$dateKonf.'/' ;
	$path = __DIR__ . "$dir";
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	foreach ($_FILES['image']['name'] as $key => $val ) {
		$file_name = $_FILES['image']['name']["$key"];
		$file_tmp = $_FILES['image']['tmp_name']["$key"];
		$podborFormata = array(
			"image/jpeg" => "jpg",
			"image/png" => "png",
		);
		foreach($podborFormata as $key2 => $val){
			if ($key2 == $_FILES['image']['type']["$key"])
			{
				$format = $val;
			}
		}
		if($format !=""){
			move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . './konf/'.$dateKonf.'/'.$file_name.'.'.$format.'');
			$dir = './konf/'.$dateKonf.'/'.$file_name.'.'.$format.'';
			$sql = "INSERT INTO `photo_conf`(`photo_conf`, `ID_conf`) VALUES ('$dir',$lastKonfID)";
			mysqli_query($connect, $sql);
		}
	}
	$_FILES['image']['name'] = [];
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////								отзыв											///////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	if(!empty($_POST['Name_feedback']) && $_POST['Name_feedback']!="" && !empty($_POST['info_feedback']) && $_POST['info_feedback']!=""){
		foreach($_POST['Name_feedback'] as $key => $val){
			$Name_feedback = htmlspecialchars($_POST['Name_feedback'][$key], ENT_QUOTES);
			$info_feedback = htmlspecialchars($_POST['info_feedback'][$key], ENT_QUOTES);
			$sql = "INSERT INTO `feedback`( `Namefeedback`,`feedback`, `ID_conf`) VALUES ('$Name_feedback','$info_feedback',$lastKonfID)";
			mysqli_query($connect, $sql);
		}	
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////								Ролики											///////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if(!empty($_POST['mass'] && $_POST['mass']!="")){
		htmlspecialchars("текст", ENT_QUOTES);
		foreach($_POST['mass'] as $key => $value){
			$videoLink=htmlspecialchars($_POST['mass'][$key], ENT_QUOTES);
			$sql = "INSERT INTO `video_conf`( `video_conf`, `ID_conf`) VALUES ('$videoLink',$lastKonfID)";
			mysqli_query($connect, $sql);
		}
	}

}