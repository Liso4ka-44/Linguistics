<?php
 session_start();
 if($_SESSION['aut']!='true'){
     echo"<script>document.location.href='/index.php';</script>";
     exit();
 }
include "../connect.php";
$id = $_POST["id"];
$namespeak = $_POST['Name_speaker'];
$link_speak =$_POST['link_speak'];

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
    $id = (int) $_GET['id'];
    if(!empty($_FILES['fhspeak']['name'])){
        $id = (int) $_GET['id'];
        $query = "SELECT  `date` FROM `conferences` WHERE `ID_conf` = $id ";
        $poisk = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($poisk);
        var_dump($row);
		$dateKonf = date("Y.m.d",strtotime($row["date"]));
        $dir = "/adminPanels/konf/$dateKonf/speakers" ;
		$path = __DIR__ . "/adminPanels/konf/$dateKonf/speakers/";
		if (!is_dir($path)) {
			mkdir($path, 0777, true);
		}
		$file_name = $_FILES['fhspeak']['name'];
		$file_name = translitText($file_name); // преобразование в латинские символы
		$file_tmp = $_FILES['fhspeak']['tmp_name'];
        $dir = "/adminPanels/konf/$dateKonf/speakers/" ;
		move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "$dir"."$file_name");
        $dir = "konf/$dateKonf/speakers/"."$file_name";
        $sql = "INSERT INTO `speakers`(`ID_conf`,`name`,`photo`,`linkSP`) VALUES ('$id','$namespeak','$dir','$link_speak')";
        mysqli_query($connect, $sql);
        echo "<script> document.location.href='../speakch.php?id=".$id."';</script>"; 

	}
    else{
    $sql = "INSERT INTO `speakers`(`ID_conf`,`name`,`photo`,`linkSP`) VALUES ('$id','$namespeak','$dir','$link_speak')";
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../speakch.php?id=".$_GET['id']."';</script>"; }
    ?>