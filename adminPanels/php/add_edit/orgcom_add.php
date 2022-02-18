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
$name_ru = $_POST["name_ru"];
$name_en = $_POST["name_en"];
$link_ru = $_POST["url_ru"];
$link_en = $_POST["url_en"];
$post_ru = $_POST["post_ru"];
$post_en = $_POST["post_en"];
if (!empty($_FILES['photo']['name'])) {
	$dir = "./../orgcom/";
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
		move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/orgcom/$file_name");
		$dir = "orgcom/$file_name";
		$sql = "INSERT INTO `committee`( `name_per_ru`, `name_per_en`, `photo_per`, `link_per_ru`, `link_per_en`, `position_ru`, `position_en`) VALUES ('$name_ru', '$name_en', '$dir','$link_ru', '$link_en', '$post_ru', '$post_en')";
		mysqli_query($connect, $sql);
		echo "<script> document.location.href='../orgcom.php';</script>";
	}
	echo "<script> document.location.href='../orgcom.php';</script>";
}
