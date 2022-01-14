<?php
function translitText($str){
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
	$resultranslit = strtr($str,$tr);
	return $resultranslit;
}

 session_start();
 if($_SESSION['aut']!='true'){
	 echo"<script>document.location.href='/index.php';</script>";
	 exit();
 }
	header("Content-Type: text/html; charset=utf-8");
	include "../connect.php";
	$dir = './../konf' ;
	$path = __DIR__ . "$dir";
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	$dateKonf = date("Y.m.d",strtotime($_POST["date_conf"]));
	$dir = "/adminPanels/konf/$dateKonf/centralphoto/" ;
	$path = __DIR__ . "./../konf/$dateKonf/centralphoto";
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	if($_POST["date_conf"]!=''&&$_POST['Name_conf']!=''){
		$dateKonf = date("Y/m/d",strtotime($_POST["date_conf"]));
		$format ="";
		$info = $_POST['info'];
		$Name_conf = $_POST['Name_conf'];
		$dateComps = date_parse($dateKonf);
		$year = (string) $dateComps['year'];
		$query = "SELECT `ID_year` FROM `years` WHERE `year` ='$year'";
		$poisk = mysqli_query($connect, $query);
		$rezult = mysqli_fetch_assoc($poisk);
		$idyear = (int) $rezult['ID_year'];
		if(!empty($_FILES['Centralimage']['name'])){
			$dateKonf = date("Y.m.d",strtotime($_POST["date_conf"]));
			$dir = "/adminPanels/konf/$dateKonf/centralphoto/" ;
			$path = __DIR__ . "./../konf/$dateKonf/centralphoto";
			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}
			$file_name = $_FILES['Centralimage']['name'];
			$file_name = translitText($file_name);
			$file_tmp = $_FILES['Centralimage']['tmp_name'];
			move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "$dir"."$file_name");
			$centralPhoto="konf/$dateKonf/centralphoto/$file_name";
		}
		else{
			$centralPhoto='';
		}
		
	$sql = "INSERT INTO `conferences` (`Name_conf`, `ID_year`, `date`,`main_photo`, `info`) values ('$Name_conf',$idyear,'$dateKonf','$centralPhoto','$info')";
	mysqli_query($connect, $sql);
	$query = "SELECT MAX(`ID_conf`) FROM `conferences`";
	$poisk = mysqli_query($connect, $query);
	$rezult = mysqli_fetch_assoc($poisk);
	$lastKonfID = (int) $rezult["MAX(`ID_conf`)"];
	$dateKonf = date("Y.m.d",strtotime($_POST["date_conf"]));
	$dir = "./../konf/$dateKonf/ellcollection/" ;
	$path = __DIR__ . "$dir";
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}

	

	if(!empty($_FILES["file"]["name"])){
		$namecoll = $_POST['Name_collection'];
		$dateKonf = date("Y.m.d",strtotime($_POST["date_conf"]));
		$input_name = 'file';
		$dir = "./../konf/$dateKonf/ellcollection/" ;
    	$allow = array();
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
    	    		if (!empty($file['error']) || empty($file['tmp_name'])) {
    	    			$error = 'Не удалось загрузить файл.';
    	    		} elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
    	    			$error = 'Не удалось загрузить файл.';
    	    		} else {
    	    			$pattern = "[^A-Za-zА-ЯЁа-яё0-9,~!@#% ^-_\$\?\(\)\{\}\[\]\.]";
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
							$name = translitText($name); 						
							if (move_uploaded_file($file['tmp_name'], $path . $name )) {
								$dir = htmlspecialchars("/adminPanels/konf/$dateKonf/ellcollection/$name", ENT_QUOTES);
								$sql = "INSERT INTO `el_collection`(`Name_documents`, `Road_to_documents`, `ID_conf`) VALUES ('$namecoll','$dir',$lastKonfID)";
								mysqli_query($connect, $sql);
    	    					$success = 'Файл «' . $name . '» успешно загружен.'.$ggwp;
    	    				} 
    	    			}
    	    		}
    	    	}
    	    }
		}
	}

	if(!empty($_FILES['cover']['name'])){
		$dateKonf = date("Y.m.d",strtotime($_POST["date_conf"]));
		$dir = "/adminPanels/konf/$dateKonf/cover/" ;
		$path = __DIR__ . "./../konf/$dateKonf/cover";
		if (!is_dir($path)) {
			mkdir($path, 0777, true);
		}
		$file_name = $_FILES['cover']['name'];
		$file_name = translitText($file_name); 
		$file_tmp = $_FILES['cover']['tmp_name'];
		move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "$dir"."$file_name");
		$cover = "konf/$dateKonf/cover/$file_name";
	}
	else{
		$cover='';
	}
	$sql = "UPDATE `el_collection` SET `cover`='".$cover."' WHERE `ID_conf` =".$lastKonfID;
			mysqli_query($connect, $sql);

	$dir = "./../konf/$dateKonf/foto/" ;
	$path = __DIR__ . "$dir";
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	if(!empty($_FILES['image']['name'])&&$_FILES['image']['name']!=''){
		$dir = "./../konf/$dateKonf/foto/" ;
		$path = __DIR__ . "$dir";
		if (!is_dir($path)) {
			mkdir($path, 0777, true);
		}
		foreach ($_FILES['image']['name'] as $key => $val ) {
			if($file_name = $_FILES['image']['name']["$key"]!=''){
				$file_name = $_FILES['image']['name']["$key"];
				$file_name = translitText($file_name);
				$file_tmp = $_FILES['image']['tmp_name']["$key"];
				move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/konf/$dateKonf/foto/$file_name");
				$dir = "konf/$dateKonf/foto/$file_name";
				$sql = "INSERT INTO `photo_conf`(`photo_conf`, `ID_conf`) VALUES ('$dir',$lastKonfID)";
				mysqli_query($connect, $sql);
			}
		}
	}
	if(!empty($_POST['Name_feedback']) && $_POST['Name_feedback']!="" && !empty($_POST['info_feedback']) && $_POST['info_feedback']!=""){
		foreach($_POST['Name_feedback'] as $key => $val){
			if($_POST['Name_feedback'][$key]!=''){
			$Name_feedback = htmlspecialchars($_POST['Name_feedback'][$key], ENT_QUOTES);
			$info_feedback = htmlspecialchars($_POST['info_feedback'][$key], ENT_QUOTES);
			$sql = "INSERT INTO `feedback`( `Name_feedback`,`feedback`, `ID_conf`) VALUES ('$Name_feedback','$info_feedback',$lastKonfID)";
			mysqli_query($connect, $sql);}
		}	
	}
	if(!empty($_POST['mass'] && $_POST['mass']!="")){
		foreach($_POST['mass'] as $key => $value){
			if(!empty($_POST['mass'][$key])&&$_POST['mass'][$key]!=""){
				$videoLink = explode('v=', $_POST['mass'][$key], 2);
				$sql = "INSERT INTO `video_conf`( `video_conf`, `ID_conf`) VALUES ('$videoLink[1]',$lastKonfID)";
				mysqli_query($connect, $sql);			
			}						
		}
	}
	$path = __DIR__ . "./../konf/$dateKonf/speakers";
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}			
	
	if(!empty($_POST['Name_speaker'])){
		if( $_POST['Name_speaker']!=''){
			$namespeak = $_POST['Name_speaker'];
			$link_speak = $_POST['link_speak'];
			if(!empty($_FILES['fhspeak']['name'])){
				$dateKonf = date("Y.m.d",strtotime($_POST["date_conf"]));
				$dir = "/adminPanels/konf/$dateKonf/speakers/" ;
				$path = __DIR__ . "./../konf/$dateKonf/speakers";
				if (!is_dir($path)) {
					mkdir($path, 0777, true);
				}
				$file_name = $_FILES['fhspeak']['name'];
				$file_name = translitText($file_name); 
				$file_tmp = $_FILES['fhspeak']['tmp_name'];
				move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "$dir"."$file_name");
				$phspeak = "konf/$dateKonf/speakers/$file_name";
			}
			else{
				$phspeak='';
			}
			$sql = "INSERT INTO `speakers`(`ID_conf`,`name`,`photo`,`linkSP`) VALUES ('$lastKonfID','$namespeak','$phspeak','$link_speak')";
			mysqli_query($connect, $sql);
		}
	}

	echo "<script> document.location.href='../conflist.php';</script>"; 	
}

	