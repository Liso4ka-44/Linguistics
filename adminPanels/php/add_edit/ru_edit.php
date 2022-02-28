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

$ID_conf = (int)$_GET['ID_konf'];
$ID_speak=(int)$_GET['ID_speak'];
$ID_feedback=(int)$_GET['ID_feed'];

if ($_GET['update'] == 'up_name_conf') {
    if(isset($_POST["name_conf"])){
    $sql = "UPDATE `conferences` SET `Name_conf_ru`= '" . $_POST["name_ru"] . "' WHERE `ID_conf` =".$ID_conf;
    mysqli_query($connect, $sql);
    
    }

    if(isset($_POST["concept"])) {
        $sql = "UPDATE `conferences` SET `an_conception_ru`= '" . $_POST["concept_ru"] . "' WHERE `ID_conf` =".$ID_conf;
        mysqli_query($connect, $sql);
    }

    if(isset($_POST["intro"])) {
        $sql = "UPDATE `conferences` SET `anons_name_ru`= '" . $_POST["introduction_ru"] . "' WHERE `ID_conf` =".$ID_conf;
        mysqli_query($connect, $sql);
    }

    if(isset($_POST["an_info"])) {
        $sql = "UPDATE `conferences` SET `info_anons_ru`= '" . $_POST["infoan_ru"] . "' WHERE `ID_conf` =".$ID_conf;
        mysqli_query($connect, $sql);
    }

    if(isset($_POST["info"])) {
        $sql = "UPDATE `conferences` SET `info_ru`= '" . $_POST["info_ru"] . "' WHERE `ID_conf` =".$ID_conf;
        mysqli_query($connect, $sql);
    }

    echo "<script> document.location.href='../editing-ru.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_namesp') {
    $sql = "UPDATE `speakers` SET `name_ru`= '" . $_POST["name_sp_ru"] . "' WHERE `ID_speak` =".$ID_speak;
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-ru.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_sphoto') {
    $query = "SELECT `date_from` FROM `dates` WHERE `text_ru` LIKE 'Конференция%' AND `ID_conf` = $ID_conf";
    $poisk = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($poisk);
    $dateKonf = date("Y.m.d",strtotime($row["date_from"]));

    if (!empty($_FILES['photo']['name'])) {
      $query1 = "SELECT `photo` FROM `speakers` WHERE `ID_speak` = $ID_speak";
      $poiskk = mysqli_query($connect, $query1);
      $row = mysqli_fetch_assoc($poiskk);
      $patch = $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/$row[photo]";
  
      if (file_exists($patch)) {
        if (unlink($patch)) {
          echo 'файл удален';
        }
      }
      $file_name = $_FILES['photo']['name'];
      $file_tmp = $_FILES['photo']['tmp_name'];
      $link = htmlspecialchars($link, ENT_QUOTES);
      move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/konf/$dateKonf/speakers/$file_name");
      $dir = "konf/$dateKonf/speakers/$file_name";
      $sql = "UPDATE `speakers` SET `photo`= '$dir'  WHERE `ID_speak` = " . $ID_speak;
      mysqli_query($connect, $sql);
      
    }
    echo "<script> document.location.href='../editing-ru.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_speaker') {
    if(isset($_POST["info"])) {
        $sql = "UPDATE `speakers` SET `info_ru`= '" . $_POST["info_sp_ru"] . "' WHERE `ID_speak` =".$ID_speak;
        mysqli_query($connect, $sql);
    }

    if(isset($_POST["link"])) {
        $sql = "UPDATE `speakers` SET `linkSP_ru`= '" . $_POST["link_sp_ru"] . "' WHERE `ID_speak` =".$ID_speak;
        mysqli_query($connect, $sql);
    }

    if(isset($_POST["delete"])) {
        $query = "SELECT `photo` FROM `speakers` WHERE `ID_speak` = $ID_speak ";
        $poisk = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($poisk);
        $patch = $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/$row[photo]";
            if (file_exists($patch)) {
                if (unlink($patch)) {
                    }
                }
    $result = mysqli_query($connect, "DELETE FROM `speakers` WHERE `ID_speak` = $ID_speak");
    }
    echo "<script> document.location.href='../editing-ru.php?id_konf=$ID_conf';</script>";
}

if ($_GET['update'] == 'up_feed') {

    if(isset($_POST["name_b"])) {
        $sql = "UPDATE `feedback` SET `Name_feedback_ru`= '" . $_POST["name"] . "' WHERE `ID_feedback` =".$ID_feedback;
        mysqli_query($connect, $sql);
    }

    if(isset($_POST["post_b"])) {
        $sql = "UPDATE `feedback` SET `post_ru`= '" . $_POST["post"] . "' WHERE `ID_feedback` =".$ID_feedback;
        mysqli_query($connect, $sql);
    }

    if(isset($_POST["text_b"])) {
        $sql = "UPDATE `feedback` SET `feedback_ru`= '" . $_POST["text"] . "' WHERE `ID_feedback` =".$ID_feedback;
        mysqli_query($connect, $sql);
    }

    if(isset($_POST["delete"])) {
    $result = mysqli_query($connect, "DELETE FROM `feedback` WHERE `ID_feedback` = $ID_feedback");
    }

    echo "<script> document.location.href='../editing-ru.php?id_konf=$ID_conf';</script>";
}

?>