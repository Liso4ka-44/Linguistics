<?php
include "../connect.php";
if(!empty($_FILES["file"]["name"])){
		$query = "SELECT `date` FROM `conferences` WHERE  `ID_conf` = ".$_GET['id']."";
    	$poisk = mysqli_query($connect, $query);
		$row = mysqli_fetch_assoc($poisk);
		$dateKonf = date("d.m.Y",strtotime($row["date"]));
		$input_name = 'file';
		//директория
		$dir = "./../konf/$dateKonf/" ;
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
								$dir = htmlspecialchars("konf/$dateKonf/$name", ENT_QUOTES);
                                $lastKonfID = $_GET['id'];
								$sql = "INSERT INTO `el_collection`(`Name_documents`, `Road_to_documents`, `ID_conf`) VALUES ('$name','$dir',$lastKonfID)";
								mysqli_query($connect, $sql);
    	    				} 
    	    			}
    	    		}
    	    	}
    	    }
		}
	}
?>