<?php
include "../connect.php";

$ID_conf = (int)$_GET['ID_konf'];
$query = "SELECT `date_from` FROM `dates` WHERE `text_ru` LIKE 'Конференция%' AND `ID_conf` = $ID_conf";
$poisk = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($poisk);
$dateKonf = date("Y.m.d",strtotime($row["date_from"]));

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


if($_GET["add"]=="add_dates"){
    $date_from = $_POST['date_from'];
    $date_to = $_POST['date_to'];
    $text_ru = $_POST['text_ru'];
    $text_en = $_POST['text_en'];
    $sql = "INSERT INTO `dates`( `date_from`,`date_to`, `text_ru`, `text_en`, `ID_conf`) VALUES ('$date_from', '$date_to', '$text_ru', '$text_en', '$ID_conf')";
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if($_GET["add"]=="add_playbill"){
    $name_ru = $_POST['name_ru'];
    $name_en = $_POST['name_en'];
    $sql = "INSERT INTO `playbill`( `name_playbill_ru`, `name_playbill_en`, `ID_conf`) VALUES ('$name_ru', '$name_en', '$ID_conf')";
    mysqli_query($connect, $sql);

    if(!empty($_FILES["playbill_ru"]["name"])){
        
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
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if($_GET["add"]=="add_collection"){
    $name_ru = $_POST['name_ru'];
    $name_en = $_POST['name_en'];
    $elibrary = $_POST['elibrary'];

    $sql = "INSERT INTO `el_collection`( `Name_documents_ru`, `Name_documents_en`, `link`, `ID_conf`) VALUES ('$name_ru', '$name_en', '$elibrary', '$ID_conf')";
    mysqli_query($connect, $sql);

    if(!empty($_FILES["collection"]["name"])){
        $input_name = 'collection';
        $dir = "./../../konf/$dateKonf/ellcollection/" ;
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
                                $quer = "SELECT MAX(`ID_documents`) FROM `el_collection`";
                                $poiskk = mysqli_query($connect, $quer);
                                $rezult = mysqli_fetch_assoc($poiskk);
                                $id_doc = (int) $rezult["MAX(`ID_documents`)"];
                                $dir = htmlspecialchars("/adminPanels/konf/$dateKonf/ellcollection/$name", ENT_QUOTES);
                                $sql = "UPDATE `el_collection` SET `Road_to_documents`='".$dir."' WHERE `ID_documents` =".$id_doc;
                                mysqli_query($connect, $sql);
                                echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
                            } 
                        }
                    }
                }
            }
        }
    }

    if (!empty($_FILES['photo']['name'])) {
        $dir = "./../../konf/$dateKonf/cover/";
        $path = __DIR__ . "$dir";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $file_name = $_FILES['photo']['name'];
        $file_name = translitText($file_name); // преобразование в латинские символы
        $file_tmp = $_FILES['photo']['tmp_name'];
    
        $podborFormata = array(
            "image/jpeg" => "jpg",
            "image/png" => "png",
        );
        foreach ($podborFormata as $key2 => $val) {
            if ($key2 == $_FILES['photo']['type']) {
                $format = $val;
            }
        }
        $link = htmlspecialchars($link, ENT_QUOTES);
        if ($format != "") {
            $quer = "SELECT MAX(`ID_documents`) FROM `el_collection`";
            $poiskk = mysqli_query($connect, $quer);
            $rezult = mysqli_fetch_assoc($poiskk);
            $id_doc = (int) $rezult["MAX(`ID_documents`)"];             
            move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/konf/$dateKonf/cover/$file_name");
            $dir = "konf/$dateKonf/cover/$file_name";
            $sql = "UPDATE `el_collection` SET `cover`='".$dir."' WHERE `ID_documents` =".$id_doc;
            mysqli_query($connect, $sql);
           
        }
    }
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if($_GET["add"]=="add_photo"){
    if(!empty($_FILES['image']['name'])&&$_FILES['image']['name']!=''){
        $dir = "./../../konf/$dateKonf/foto/" ;
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
                        $sql = "INSERT INTO `photo_conf`(`photo_conf`, `ID_conf`) VALUES ('$dir',$ID_conf)";
                        mysqli_query($connect, $sql);
                    }
                }
    }
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if($_GET["add"]=="add_video"){
    if(!empty($_POST['url_video'] && $_POST['url_video']!="")){
        $videoLink = explode('v=', $_POST['url_video'], 2);
        $sql = "INSERT INTO `video_conf`( `video_conf`, `ID_conf`) VALUES ('$videoLink[1]',$ID_conf)";
        mysqli_query($connect, $sql);
    }
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if($_GET["add"]=="add_partner"){
    if(!empty($_FILES['image']['name'])&&$_FILES['image']['name']!=''){
        $dir = "./../../konf/$dateKonf/partners/" ;
        $path = __DIR__ . "$dir";
            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
                foreach ($_FILES['image']['name'] as $key => $val ) {
                    if($file_name = $_FILES['image']['name']["$key"]!=''){
                        $file_name = $_FILES['image']['name']["$key"];
                        $file_name = translitText($file_name);
                        $file_tmp = $_FILES['image']['tmp_name']["$key"];
                        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/konf/$dateKonf/partners/$file_name");
                        $dir = "konf/$dateKonf/partners/$file_name";
                        $sql = "INSERT INTO `partners`(`logo`, `ID_conf`) VALUES ('$dir',$ID_conf)";
                        mysqli_query($connect, $sql);
                    }
                }
    }
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}
?>