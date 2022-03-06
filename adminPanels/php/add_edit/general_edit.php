<?php 
include "../connect.php";

$ID_conf = (int)$_GET['ID_konf'];
$ID_playbill = (int)$_GET['ID_playbill'];
$ID_date = (int)$_GET['ID_date'];
$ID_doc = (int)$_GET['ID_doc'];
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

if ($_GET['update'] == 'up_konf_date') {
    $sql = "UPDATE `dates` SET `date_from`= '" . $_POST["date_from"] . "', `date_to`= '" . $_POST["date_to"] . "' WHERE `text_ru` LIKE 'Конференция%' AND `ID_conf` =".$ID_conf;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_dates') {
   
    $sql = "UPDATE `dates` SET `date_from`= '" . $_POST["date_from"] . "', `date_to`= '" . $_POST["date_to"] . "' WHERE `ID_date` =".$ID_date;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_desc_ru') {
    $sql = "UPDATE `dates` SET `text_ru`= '" . $_POST["text_ru"] . "' WHERE `ID_date` =".$ID_date;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_desc_en') {
    $sql = "UPDATE `dates` SET `text_en`= '" . $_POST["text_en"] . "' WHERE `ID_date` =".$ID_date;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'del_date') {
    $result = mysqli_query($connect, "DELETE FROM `dates` WHERE `ID_date` = $ID_date");
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_plname_ru') {
    $sql = "UPDATE `playbill` SET `name_playbill_ru`= '" . $_POST["name_ru"] . "' WHERE `ID_playbill` =".$ID_playbill;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_colname_ru') {
    $sql = "UPDATE `el_collection` SET `Name_documents_ru`= '" . $_POST["name_ru"] . "' WHERE `ID_documents` =".$ID_doc;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_colname_en') {
    $sql = "UPDATE `el_collection` SET `Name_documents_en`= '" . $_POST["name_en"] . "' WHERE `ID_documents` =".$ID_doc;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_collink') {
    $sql = "UPDATE `el_collection` SET `link`= '" . $_POST["link"] . "' WHERE `ID_documents` =".$ID_doc;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_plname_en') {
    $sql = "UPDATE `playbill` SET `name_playbill_en`= '" . $_POST["name_en"] . "' WHERE `ID_playbill` =".$ID_playbill;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if($_GET['update']=='up_file_ru'){
    $sql = "SELECT  `road_ru` FROM `playbill` WHERE `ID_playbill` = ".$ID_playbill;
    $poisk=mysqli_query($connect, $sql);	
    $row = mysqli_fetch_assoc($poisk);
    if($row["road_ru"]!=''){
      $patch ="../../..".$row["road_ru"];
      if (file_exists($patch)) {
        if(unlink($_SERVER['DOCUMENT_ROOT']."$row[road_ru]")){
          echo 'файл удален';
        }
      }
    }

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
                                $dir = htmlspecialchars("/adminPanels/konf/$dateKonf/playbill/$name", ENT_QUOTES);
                                $sql = "UPDATE `playbill` SET `road_ru`= '$dir' WHERE `ID_playbill` =".$ID_playbill;
                                mysqli_query($connect, $sql);
                                echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
                            } 
                        }
                    }
                }
            }
        }
    }
}

if($_GET['update']=='up_file_en'){
    $sql = "SELECT  `road_en` FROM `playbill` WHERE `ID_playbill` = ".$ID_playbill;
    $poisk=mysqli_query($connect, $sql);	
    $row = mysqli_fetch_assoc($poisk);
    if($row["road_en"]!=''){
      $patch ="../../..".$row["road_en"];
      if (file_exists($patch)) {
        if(unlink($_SERVER['DOCUMENT_ROOT']."$row[road_en]")){
          echo 'файл удален';
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
                                $dir = htmlspecialchars("/adminPanels/konf/$dateKonf/playbill/$name", ENT_QUOTES);
                                $sql = "UPDATE `playbill` SET `road_en`= '$dir' WHERE `ID_playbill` =".$ID_playbill;
                                mysqli_query($connect, $sql);
                                echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
                            } 
                        }
                    }
                }
            }
        }
    }
}

if($_GET['update']=='del_playbill'){
    $sql = "SELECT  `road_ru`, `road_en` FROM `playbill` WHERE `ID_playbill` = ".$ID_playbill;
    $poisk=mysqli_query($connect, $sql);	
    $row = mysqli_fetch_assoc($poisk);
    if($row["road_ru"]!=''){
        $patch ="../../..".$row["road_ru"];
        if (file_exists($patch)) {
            if(unlink($_SERVER['DOCUMENT_ROOT']."$row[road_ru]")){
            echo 'файл удален';
            }
        }
    }
    
    if($row["road_en"]!=''){
        $patch ="../../..".$row["road_en"];
        if (file_exists($patch)) {
            if(unlink($_SERVER['DOCUMENT_ROOT']."$row[road_en]")){
            echo 'файл удален';
            }
        }
    }

      $sql = "DELETE FROM `playbill` WHERE `ID_playbill`=".$ID_playbill;
      mysqli_query($connect, $sql);	
      echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_cover') {

    if (!empty($_FILES['photo']['name'])) {
      $query1 = "SELECT `cover` FROM `el_collection` WHERE `ID_documents` = $ID_doc";
      $poiskk = mysqli_query($connect, $query1);
      $row = mysqli_fetch_assoc($poiskk);
      $patch = $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/$row[cover]";
  
      if (file_exists($patch)) {
        if (unlink($patch)) {
          echo 'файл удален';
        }
      }
      $file_name = $_FILES['photo']['name'];
      $file_tmp = $_FILES['photo']['tmp_name'];
      $link = htmlspecialchars($link, ENT_QUOTES);
      move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/konf/$dateKonf/cover/$file_name");
      $dir = "konf/$dateKonf/cover/$file_name";
      $sql = "UPDATE `el_collection` SET `cover`= '$dir'  WHERE `ID_documents` = " . $ID_doc;
      mysqli_query($connect, $sql);
      echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
    }
}

if($_GET['update']=='up_collection'){
    $sql = "SELECT  `Road_to_documents` FROM `el_collection` WHERE `ID_documents` = ".$ID_doc;
    $poisk=mysqli_query($connect, $sql);	
    $row = mysqli_fetch_assoc($poisk);
    if($row["Road_to_documents"]!=''){
      $patch ="../../..".$row["Road_to_documents"];
      if (file_exists($patch)) {
        if(unlink($_SERVER['DOCUMENT_ROOT']."$row[Road_to_documents]")){
          echo 'файл удален';
        }
      }
    }
    
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
                                $dir = htmlspecialchars("/adminPanels/konf/$dateKonf/ellcollection/$name", ENT_QUOTES);
                                $sql = "UPDATE `el_collection` SET `Road_to_documents`= '$dir' WHERE `ID_documents` =".$ID_doc;
                                mysqli_query($connect, $sql);
                                echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
                            } 
                        }
                    }
                }
            }
        }
    }
}

if($_GET['update']=='del_col'){
    $sql = "SELECT  `Road_to_documents`, `cover` FROM `el_collection` WHERE `ID_documents` = ".$ID_doc;
    $poisk=mysqli_query($connect, $sql);	
    $row = mysqli_fetch_assoc($poisk);
    if($row["Road_to_documents"]!=''){
        $patch ="../../..".$row["Road_to_documents"];
        if (file_exists($patch)) {
            if(unlink($_SERVER['DOCUMENT_ROOT']."$row[Road_to_documents]")){
            echo 'файл удален';
            }
        }
    }
    
    if($row["cover"]!=''){
        $patch ="../../../adminPanels/".$row["cover"];
        if (file_exists($patch)) {
            if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/"."$row[cover]")){
            echo 'файл удален';
            }
        }
    }

      $sql = "DELETE FROM `el_collection` WHERE `ID_documents`=".$ID_doc;
      mysqli_query($connect, $sql);	
      echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_mainph') {
    
    if (!empty($_FILES['mainph']['name'])) {
    
    $quer = "SELECT `main_photo` FROM `conferences` WHERE `ID_conf` = $ID_conf";
    $poisk = mysqli_query($connect, $quer);
    $row = mysqli_fetch_assoc($poisk);
    $patch = $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/$row[main_photo]";
  
      /*if (file_exists($patch)) {
        if (unlink($patch)) {
          echo 'файл удален';
        }
      }*/
      $file_name = $_FILES['mainph']['name'];
      $file_tmp = $_FILES['mainph']['tmp_name'];
      $link = htmlspecialchars($link, ENT_QUOTES);
      move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/konf/$dateKonf/centralphoto/$file_name");
      $dir = "konf/$dateKonf/centralphoto/$file_name";
      $sql = "UPDATE `conferences` SET `main_photo`= '$dir'  WHERE `ID_conf` = " . $ID_conf;
      mysqli_query($connect, $sql);
      echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
    }
}

if ($_GET['update'] == 'del_photo') {
    $id_ph = $_GET['ID_photo'];
    $query = "SELECT `photo_conf` FROM `photo_conf` WHERE `ID_photo` = $id_ph";
    $poisk = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($poisk);
    $patch = $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/$row[photo_conf]";
    if (file_exists($patch)) {
      if (unlink($patch)) {
      }
    }
    $result = mysqli_query($connect, "DELETE FROM `photo_conf` WHERE `ID_photo` = $id_ph");
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'del_video') {
    $id_v = $_GET['ID_video'];
    $result = mysqli_query($connect, "DELETE FROM `video_conf` WHERE `ID_video_conf` = $id_v");
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'del_partner') {
    $id_p = $_GET['ID_partner'];
    $query = "SELECT `logo` FROM `partners` WHERE `ID_partner` = $id_p";
    $poisk = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($poisk);
    $patch = $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/$row[logo]";
    if (file_exists($patch)) {
      if (unlink($patch)) {
      }
    }
    $result = mysqli_query($connect, "DELETE FROM `partners` WHERE `ID_partner` = $id_p");
    echo "<script> document.location.href='../editing-info.php?id_konf=$ID_conf';</script>";
}

?>