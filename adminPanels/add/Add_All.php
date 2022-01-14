<?php
    session_start();
    if($_SESSION['aut']!='true'){
        echo"<script>document.location.href='/index.php';</script>";
        exit();
    }
	
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
            return strtr($str,$tr);
        }
	
    if($_GET["add"]=="addfoto"){
        include "../connect.php";	
        $id = (int) $_GET['id'];
        $sql = "SELECT  `date` FROM `conferences` WHERE `ID_conf` =  $id";
        $poisk=mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($poisk);
        $dateKonf = date("Y.m.d",strtotime($row["date"]));
	    
        if(!empty($_FILES['image']['name'])){
            foreach ($_FILES['image']['name'] as $key => $val ) {
                if($_FILES['image']['name']["$key"]!=''){
                $file_name = $_FILES['image']['name']["$key"];
                $file_name = translitText($file_name);
                $file_tmp = $_FILES['image']['tmp_name']["$key"];
                move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/konf/$dateKonf/foto/$file_name");
                $dir = "konf/$dateKonf/foto/$file_name";
                $sql = "INSERT INTO `photo_conf`(`photo_conf`, `ID_conf`) VALUES ('$dir',$id)";
                mysqli_query($connect, $sql);}
            }
            echo "<script>document.location.href='../foto.php?id=$id';</script>"; 
        }
        echo "<script>document.location.href='../foto.php?id=$id';</script>"; 
    }
    if($_GET["add"]=="speakeradd"){
        include "../connect.php";
        $id = (int) $_GET['id'];
        $namespeak = $_POST['Name_speaker'];
        $link_speak =$_POST['link_speak'];
        $sql = "SELECT  `date` FROM `conferences` WHERE `ID_conf` =  $id";
        $poisk=mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($poisk);
        if(!empty($_FILES['fhspeak']['name'])){
            $dateKonf = date("Y.m.d",strtotime($row["date"]));
            $dir = "/adminPanels/konf/$dateKonf/speakers/" ;
            $path = __DIR__ . "./../konf/$dateKonf/speakers";
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
            $file_name = $_FILES['fhspeak']['name'];
			//$file_name = translitText($file_name); 
            $file_tmp = $_FILES['fhspeak']['tmp_name'];
            move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "$dir"."$file_name");
            $phspeak = "konf/$dateKonf/speakers/$file_name";
        }
        $sql = "INSERT INTO `speakers`(`ID_conf`,`name`,`photo`,`linkSP`) VALUES ('$id','$namespeak','$phspeak','$link_speak')";
        mysqli_query($connect, $sql);
    }
    if($_GET['add']=='newdock'){
        include "../connect.php";
        if(!empty($_FILES["file"]["name"])){
            $namecoll = $_POST['Name_collection'];
            $link = $_POST['link_collection'];
            $query = "SELECT `date` FROM `conferences` WHERE  `ID_conf` = ".$_GET['id']."";
            $poisk = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($poisk);
            $dateKonf = date("Y.m.d",strtotime($row["date"]));
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
                        // Проверим на ошибки загрузки.
                        if (!empty($file['error']) || empty($file['tmp_name'])) {
                            $error = 'Не удалось загрузить файл.';
                        } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
                            $error = 'Не удалось загрузить файл.';
                        } else {
                            // Оставляем в имени файла только буквы, цифры и некоторые символы.
                            $pattern = "[^A-Za-zА-Яа-яё0-9,~!@#% ^-_\$\?\(\)\{\}\[\]\.]";
                            $name = mb_eregi_replace($pattern, '-', $file['name']);
                            $name = translitText($name); 
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
                                    $dir = htmlspecialchars("/adminPanels/konf/$dateKonf/ellcollection/$name", ENT_QUOTES);
                                    $lastKonfID = $_GET['id'];
                                    $sql = "INSERT INTO `el_collection`(`Name_documents`, `Road_to_documents`, `ID_conf`, `link`) VALUES ('$namecoll','$dir',$lastKonfID,'$link')";
                                    mysqli_query($connect, $sql);
                                    echo "<script>document.location.href='../documents.php?id=$lastKonfID';</script>"; 
                                } 
                            }
                        }
                    }
                }
            }
        }
        echo "<script>document.location.href='../documents.php?id=".$_GET['id']."';</script>"; 
    }

    if($_GET['add']=='newdock'){
        include "../connect.php";
    if(!empty($_FILES['cover']['name'])){
		$query = "SELECT `date` FROM `conferences` WHERE  `ID_conf` = ".$_GET['id']."";
            $poisk = mysqli_query($connect, $query);
            $row = mysqli_fetch_assoc($poisk);
            $dateKonf = date("Y.m.d",strtotime($row["date"]));
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
    //$id = $_GET['id'];
    $quer = "SELECT MAX(`ID_documents`) FROM `el_collection`";
	$poiskk = mysqli_query($connect, $quer);
	$rezult = mysqli_fetch_assoc($poiskk);
    $id = (int) $rezult["MAX(`ID_documents`)"];
	$sql = "UPDATE `el_collection` SET `cover`='".$cover."' WHERE `ID_documents` =".$id;
			mysqli_query($connect, $sql);
    }
    
    if($_GET["add"]=="ADDORGCOM"){
        include "../connect.php";
		$name = $_POST["name_orgcom"];
        $link = $_POST["url_orgcom"];
		if(!empty($_FILES['Foto_orgcom']['name'])){
			$dir = "./../orgcom/" ;
			$path = __DIR__ . "$dir";
			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}
			$file_name = $_FILES['Foto_orgcom']['name'];
			$file_tmp = $_FILES['Foto_orgcom']['tmp_name'];
			$link =htmlspecialchars($link, ENT_QUOTES);
			move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "./adminPanels/orgcom/$file_name");
			$dir = "/orgcom/$file_name";
			$sql = "INSERT INTO `сommittee`( `name_per`, `photo_per`, `link_per`) VALUES ('$name','$dir','$link')";
			mysqli_query($connect, $sql);	
        }	
    }
    if($_GET["add"]=="FEEDBACKCONF"){
        include "../connect.php";
        $id = $_GET['idconf'];
        if(!empty($_POST['Name_feedback']) && $_POST['Name_feedback']!="" && !empty($_POST['info_feedback']) && $_POST['info_feedback']!=""){
            $Name_feedback = htmlspecialchars($_POST['Name_feedback'], ENT_QUOTES);
            $info_feedback = htmlspecialchars($_POST['info_feedback'], ENT_QUOTES);
            $sql = "INSERT INTO `feedback`( `Name_feedback`,`feedback`, `ID_conf`) VALUES ('$Name_feedback','$info_feedback',$id)";
            mysqli_query($connect, $sql);
            echo "<script> document.location.href='../feedback.php?id=$id';</script>";
        }
        echo "<script> document.location.href='../feedback.php?id=$id';</script>";
    }
    if($_GET["add"]=="video"){
        include "../connect.php";
        if(!empty($_POST['url_video'] && $_POST['url_video']!="")){
            $KonfID = $_GET['idconf'];
            $videoLink = explode('v=', $_POST['url_video'], 2);
            $sql = "INSERT INTO `video_conf`( `video_conf`, `ID_conf`) VALUES ('$videoLink[1]',$KonfID)";
            mysqli_query($connect, $sql);
            echo "<script>document.location.href='../video.php?id=$KonfID';</script>"; 
        }
        echo "<script>document.location.href='../video.php?id=$KonfID';</script>"; 
    }
    if($_GET["add"]=="anons"){
        if(!empty($_POST["Name_announcement"])&&$_POST["Name_announcement"]!=""&&!empty($_POST["info_announcement"])&&$_POST["info_announcement"]!=""&&!empty($_POST["date_announcement"])&&$_POST["date_announcement"]!=""&&!empty($_POST["timeStart"])&&$_POST["timeEnd"]!=""){
            $connect = mysqli_connect("127.0.0.1","root","","mgimo");
            $nameKonf=  htmlspecialchars($_POST["Name_announcement"], ENT_QUOTES);
            $infoKonf= htmlspecialchars($_POST["info_announcement"], ENT_QUOTES);
            $nameSpeaker= htmlspecialchars($_POST["Name_speaker_announcement"], ENT_QUOTES);
            $infoSpeaker =  htmlspecialchars($_POST["Info_speaker_announcement"], ENT_QUOTES);
            $Name_program =  htmlspecialchars($_POST["Name_prog_announcement"], ENT_QUOTES);
            $fotoSpeaker="";
            $format="";
            $program="";
            $time=$_POST["timeStart"]."-".$_POST["timeEnd"];
            if(!empty($_FILES['Foto_speaker_announcement']['name'])){
                $date_announcement = date("d.m.Y",strtotime($_POST["date_announcement"]));
                $dir = '/../anons/'.$date_announcement."/";
                $path = __DIR__ . "$dir";
                var_dump($path);
                if (!is_dir($path)) {
                    mkdir($path, 0777, true);
                }
                $_FILES['Foto_speaker_announcement']['name'];
                $file_name = $_FILES['Foto_speaker_announcement']['name'];
				$file_name = translitText($file_name); 
                $file_tmp = $_FILES['Foto_speaker_announcement']['tmp_name'];
                $dir = '/adminPanels/anons/'.$date_announcement."/";
                move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . $dir.$file_name.'');
                $fotoSpeaker = $dir.$file_name.'';
                $fotoSpeaker = htmlspecialchars($fotoSpeaker, ENT_QUOTES);
            }
            else{
                $date_announcement = date("d.m.Y",strtotime($_POST["date_announcement"]));
                $dir = '/../anons/'.$date_announcement."/";
                $path = __DIR__ . "$dir";
                if (!is_dir($path)) {
                mkdir($path, 0777, true);
                }
                $dirfotononame = $_SERVER['DOCUMENT_ROOT'] ."/adminPanels/foto__noname/fotononame.jpg";
                $file_name = "fotononame.png";
                $file_name = translitText($file_name);
                $dir = '/adminPanels/anons/'.$date_announcement."/";
                copy($dirfotononame, $_SERVER['DOCUMENT_ROOT'] . $dir.$file_name.'');
                $fotoSpeaker = $dir.$file_name.'';
                $fotoSpeaker = htmlspecialchars($fotoSpeaker, ENT_QUOTES);
                }
                
			
			
			//////////////////////////////////////////////////////////////////////
			
            $dir1 = '/../playbill/'.$date_announcement."/";
                $path1 = __DIR__ . "$dir1";
                var_dump($path1);
                if (!is_dir($path1)) {
                    mkdir($path1, 0777, true);
                }
            $Programm_announcement = $_FILES['Programm_announcement']['name'];
			$Programm_announcement = translitText($Programm_announcement); 
            $file_tmp_Programm = $_FILES['Programm_announcement']['tmp_name'];
            $dir1 = '/adminPanels/playbill/'.$date_announcement."/";
            move_uploaded_file($file_tmp_Programm, $_SERVER['DOCUMENT_ROOT'] . $dir1.$Programm_announcement.'');
            $program = $dir1.$Programm_announcement.'';
            $program = htmlspecialchars($program, ENT_QUOTES);
            $date_announcement = date("Y-m-d",strtotime($_POST["date_announcement"]));
            $sql = "INSERT INTO `announcement`(`announcement_Date`, `announcement_Time`, `announcement_Name_speaker`, `announcement_info_speaker`, `announcement_foto_speaker`, `announcement_name_konf`, `announcement_info_konf`) VALUES ('$date_announcement','$time','$nameSpeaker','$infoSpeaker','$fotoSpeaker','$nameKonf','$infoKonf')";
            mysqli_query($connect, $sql);
            $max_id_anons = mysqli_query($connect,"SELECT max(`ID_announcement`) AS `ID_anons` FROM `announcement`");
            $max_id_anons = mysqli_fetch_assoc($max_id_anons);
            $max_id = (integer)$max_id_anons['ID_anons'];
            $sql2 = "INSERT INTO `playbill`(`name_playbill`, `road`, `ID_anons`) VALUES ('$Name_program','$program',$max_id)";
            mysqli_query($connect, $sql2);
            echo "<script> document.location.href='../anonslist.php';</script>";
            $_POST=[];
            
        }
        echo "<script> document.location.href='../anonslist.php';</script>";
    }
	

    if($_GET["add"]=="prog"){
        include "../connect.php";
        $value = $_POST["add__prog__button"];
        $query1 = "SELECT * FROM `announcement` WHERE `ID_announcement` = ".$value;
        $poisk1 = mysqli_query($connect, $query1);
        $poisk1 = mysqli_fetch_assoc($poisk1);
        $date_announcement = date("d.m.Y",strtotime($poisk1["announcement_Date"]));
        $Name_program3 =  htmlspecialchars($_POST["Name_prog_announcement"], ENT_QUOTES);
        $program2="";
        $dir11 = '/../playbill/'.$date_announcement."/";
        $path11 = __DIR__ . "$dir11";
        if (!is_dir($path11)) {
            mkdir($path11, 0777, true);
        }
        $Programm_announcement1 = $_FILES['Programm_announcement1']['name'];
		$Programm_announcement1 = translitText($Programm_announcement1); 
        $file_tmp_Programm1 = $_FILES['Programm_announcement1']['tmp_name'];
        $dir11 = '/adminPanels/playbill/'.$date_announcement."/";
        move_uploaded_file($file_tmp_Programm1, $_SERVER['DOCUMENT_ROOT'] . $dir11.$Programm_announcement1.'');
        $program2 = $dir11.$Programm_announcement1.'';
        $program2 = htmlspecialchars($program2, ENT_QUOTES);
        $id_conf = $_POST["add__prog__button"];
        $id = (integer)$id_conf;
        $sql2 = "INSERT INTO `playbill`(`name_playbill`, `road`, `ID_anons`) VALUES ('$Name_program3','$program2',$id)";
        mysqli_query($connect, $sql2);
        $_POST=[];
        echo "<script> document.location.href='../anonslist.php';</script>";
    }
	
	
	/*
	$dateKonf = date("Y.m.d",strtotime($_POST["date_conf"]));
	$input_name = 'program';
	$dir = "./../konf/$dateKonf/playbill/" ;
	$path = __DIR__ . "$dir";
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	if(!empty($_FILES["program"]["name"])){
		$dateKonf = date("Y.m.d",strtotime($_POST["date_conf"]));
		$input_name = 'program';
		$dir = "./../konf/$dateKonf/playbill/" ;
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
							$name = translitText($name);
    	    				if (move_uploaded_file($file['tmp_name'], $path . $name)) {
								$dir = htmlspecialchars("konf/$dateKonf/playbill/$name", ENT_QUOTES);
    	    				} 
    	    			}
    	    		}
    	    	}
    	    }
		}
	}
	else{
		$dir='';
	}*/
	
	if($_GET["add"]=='register'){
        
    }
	
    if($_GET["add"]=='register'){
        if($_POST['login']!=''&&$_POST['password']!=''){
            include "../connect.php";
            var_dump($_POST);
            $login = $_POST['login'];
            $query = "SELECT * FROM `users` WHERE `login` = '$login'";
            $poisk = mysqli_query($connect, $query);
            $rezult = mysqli_fetch_assoc($poisk);
            if ($rezult !=[]){
                exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
            }
            $login = stripslashes($login);
            $login = htmlspecialchars($login);
            $login = trim($login);
            $login = htmlspecialchars($login);
            var_dump($login);
             //password 
            $name_us =  htmlspecialchars($_POST['name_us']);
            $password = $_POST['password'];
            $password = htmlspecialchars($password);
            //Хэшируем пароль 60 символов
            $password = password_hash($password, PASSWORD_BCRYPT);
            //проверка на наличие логина в бд
             $query = "INSERT INTO `users`( `name_us`, `login`, `password`) VALUES ('$name_us','$login','$password')";
             $poisk = mysqli_query($connect, $query);
            if ($poisk=='TRUE'){
                echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.";
            }else{
                echo "Ошибка! ";
            }
            $_POST=[];
        }
    }
	
?>