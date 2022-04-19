<?php
/*session_start();
    if($_SESSION['aut']!='true'){
        echo"<script>document.location.href='/index.php';</script>";
        exit();
    }*/
include "../connect.php";
function translitText($str)
{
	$tr = array(
		"А" => "A", "Б" => "B", "В" => "V", "Г" => "G",
		"Д" => "D", "Е" => "E", "Ё" => "E", "Ж" => "J", "З" => "Z", "И" => "I",
		"Й" => "Y", "К" => "K", "Л" => "L", "М" => "M", "Н" => "N",
		"О" => "O", "П" => "P", "Р" => "R", "С" => "S", "Т" => "T",
		"У" => "U", "Ф" => "F", "Х" => "H", "Ц" => "TS", "Ч" => "CH",
		"Ш" => "SH", "Щ" => "SCH", "Ъ" => "", "Ы" => "YI", "Ь" => "",
		"Э" => "E", "Ю" => "YU", "Я" => "YA", "а" => "a", "б" => "b",
		"в" => "v", "г" => "g", "д" => "d", "е" => "e", "ё" => "e", "ж" => "j",
		"з" => "z", "и" => "i", "й" => "y", "к" => "k", "л" => "l",
		"м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r",
		"с" => "s", "т" => "t", "у" => "u", "ф" => "f", "х" => "h",
		"ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sch", "ъ" => "y",
		"ы" => "yi", "ь" => "", "э" => "e", "ю" => "yu", "я" => "ya"
	);
	return strtr($str, $tr);
}
$namesp = $_POST["namesp"];
$linksp = $_POST["linksp"];
$infosp = $_POST["infosp"];
$ID_conf = (int)$_GET['ID_konf'];
$query = "SELECT `date_from` FROM `dates` WHERE `text_ru` LIKE 'Конференция%' AND `ID_conf` = $ID_conf";
    $poisk = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($poisk);
    $dateKonf = date("Y.m.d",strtotime($row["date_from"]));

if (!empty($_FILES['photo']['name'])) {
	$dir = "./../../konf/$dateKonf/speakers/" ;
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
		move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/konf/$dateKonf/speakers/$file_name");
		$dir = "konf/$dateKonf/speakers/$file_name";
		$sql = "INSERT INTO `speakers`( `name_en`, `photo`, `linkSP_en`, `info_en`, `ID_conf`) VALUES ('$namesp', '$dir','$linksp', '$infosp', '$ID_conf')";
		mysqli_query($connect, $sql);
	}
	echo "<script> document.location.href='../editing-en.php?id_konf=$ID_conf';</script>";
}

if($_GET["add"]=="add_feed"){
    $name = $_POST['name'];
    $post = $_POST['post'];
    $text = $_POST['text'];
    $sql = "INSERT INTO `feedback`( `Name_feedback_en`,`post_en`, `feedback_en`, `ID_conf`) VALUES ('$name', '$post', '$text', '$ID_conf')";
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../editing-en.php?id_konf=$ID_conf';</script>";
}
