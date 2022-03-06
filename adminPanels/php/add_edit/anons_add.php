<?php
include "../connect.php";

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

if($_POST["date_from"]!=''&&$_POST['intro_ru']!=''){
       
        $name_ru = $_POST['name_ru'];
        $name_en = $_POST['name_en'];
        $intro_ru = $_POST['intro_ru'];
        $intro_en = $_POST['intro_en'];
        $anons_ru = $_POST['anons_info_ru'];
        $anons_en = $_POST['anons_info_en'];
        $concept_ru = $_POST['concept_ru'];
        $concept_en = $_POST['concept_en'];
        $date_from = $_POST['date_from'];
        $date_to = $_POST['date_to'];
        $year = date("Y",strtotime($_POST["date_from"]));
        $yearr = (int)$year;
        $dateKonf = date("Y.m.d",strtotime($_POST["date_from"]));

        $ifyear = "SELECT * FROM `years` WHERE `year`=$yearr";
        $poiskk = mysqli_query($connect, $ifyear);
        while (($row = mysqli_fetch_assoc($poiskk)) != false) {
            if($row['year'] != ""){
            $y = (int)$row['year'];
            }
        }
        
        if ($yearr != $y){
        $years = "INSERT INTO `years`(`year`) VALUES ('$year')";
        mysqli_query($connect, $years);
        $quer = "SELECT MAX(`ID_year`) FROM `years`";
	    $pois = mysqli_query($connect, $quer);
	    $rezul = mysqli_fetch_assoc($pois);
        $YearID = (int) $rezul["MAX(`ID_year`)"];
        
        }
        else{
        $querr = "SELECT * FROM `years` WHERE `year`=$y";
	    $poiss = mysqli_query($connect, $querr);
	    $rezull = mysqli_fetch_assoc($poiss);
        $YearID = (int) $rezull["ID_year"];
        }
        $sql = "INSERT INTO `conferences`( `Name_conf_ru`, `Name_conf_en`, `anons_name_ru`, `anons_name_en`, `info_anons_ru`, `info_anons_en`, `an_conception_ru`, `an_conception_en`, `ID_year`) VALUES ('$name_ru', '$name_en', '$intro_ru', '$intro_en', '$anons_ru', '$anons_en', '$concept_en', '$concept_en', '$YearID')";
        mysqli_query($connect, $sql);
        $query = "SELECT MAX(`ID_conf`) FROM `conferences`";
	    $poisk = mysqli_query($connect, $query);
	    $rezult = mysqli_fetch_assoc($poisk);
        $lastKonfID = (int) $rezult["MAX(`ID_conf`)"];
        $date = "INSERT INTO `dates`( `date_from`,`date_to`, `text_ru`, `ID_conf`) VALUES ('$date_from', '$date_to', 'Конференция $year', '$lastKonfID')";
        mysqli_query($connect, $date);
        
        if(!empty($_FILES["playbill_ru"]["name"])){
        $sql = "INSERT INTO `playbill`( `name_playbill_ru`, `name_playbill_en`, `ID_conf`) VALUES ('$name_ru', '$name_en', '$lastKonfID')";
        mysqli_query($connect, $sql);
            $input_name = 'playbill_ru';
            $dir = "./../../konf/$dateKonf/playbill/" ;
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
                                    $quer = "SELECT MAX(`ID_playbill`) FROM `playbill`";
                                    $poiskk = mysqli_query($connect, $quer);
                                    $rezult = mysqli_fetch_assoc($poiskk);
                                    $id_pl = (int) $rezult["MAX(`ID_playbill`)"];
                                    $dir = htmlspecialchars("/adminPanels/konf/$dateKonf/playbill/$name", ENT_QUOTES);
                                    $sql = "UPDATE `playbill` SET `road_ru`='".$dir."' WHERE `ID_playbill` =".$id_pl;
                                    mysqli_query($connect, $sql);
                                } 
                            }
                        }
                    }
                }
            }
        }
        
        if(!empty($_FILES["playbill_en"]["name"])){
            
            $input_name = 'playbill_en';
            $dir = "./../../konf/$dateKonf/playbill/" ;
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
                                    $quer = "SELECT MAX(`ID_playbill`) FROM `playbill`";
                                    $poiskk = mysqli_query($connect, $quer);
                                    $rezult = mysqli_fetch_assoc($poiskk);
                                    $id_pl = (int) $rezult["MAX(`ID_playbill`)"];
                                    $dir = htmlspecialchars("/adminPanels/konf/$dateKonf/playbill/$name", ENT_QUOTES);
                                    $sql = "UPDATE `playbill` SET `road_en`='".$dir."' WHERE `ID_playbill` =".$id_pl;
                                    mysqli_query($connect, $sql);
                                } 
                            }
                        }
                    }
                }
            }
        }

    $dir = "./../../konf/$dateKonf/centralphoto/" ;
    $path = __DIR__ . "$dir";
    mkdir($path, 0777, true);

        
    echo "<script> document.location.href='../editing.php';</script>";
}
?>    