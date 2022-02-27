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



?>