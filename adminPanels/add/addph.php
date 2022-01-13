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

if(!empty($_FILES['image']['name'])){
    $id = $_POST["id"];
	$dir = "./../editphoto/" ;
    var_dump($_POST);
	$path = __DIR__ . "$dir";
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
	foreach ($_FILES['image']['name'] as $key => $val ) {
		$file_name = $_FILES['image']['name']["$key"];
		$file_name = translitText($file_name); // преобразование в латинские символы
		$file_tmp = $_FILES['image']['tmp_name']["$key"];
			move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "../adminPanels/editphoto/$file_name");
			$dir = "editphoto/$file_name";
			$sql = "INSERT INTO `photo_conf`(`photo_conf`, `ID_conf`) VALUES ('$dir',$id)";
			mysqli_query($connect, $sql);
            header("Location:../foto.php?id=".$id);
	}
    
}
?>