<?php
if(// пердача айди !=''&& $_POST['Name_Speaker']!=''){
    $idconf = '';//   $_GET['id_conf']     $_COOKIE["id_conf"]  $_POST['id_conf']    надо выбрат каким способом в зависимости от способа вывода 
    $name = $_POST['Name_Speaker'];
    $link_speaker = htmlspecialchars($_POST['Link_Speaker'], ENT_QUOTES);
    $dir = './konf/'.'speaker'.'/' ;
	$path = __DIR__ . "$dir";
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    $file_name = $_FILES['Foto_speaker']['name'];
    $file_tmp = $_FILES['Foto_speaker']['tmp_name'];
    $podborFormata = array(
        "image/jpeg" => "jpg",
        "image/png" => "png",
    );
    foreach($podborFormata as $key2 => $val){
        if ($key2 == $_FILES['Foto_speaker']['type']){
            $format = $val;
        }
    }
    if($format !=""){
        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . $dir.$file_name.'.'.$format.'');
    }
    $_FILES['Foto_speaker'] = [];
    $fotoSpeaker = $dir.$file_name.'.'.$format.'';
    $fotoSpeaker = htmlspecialchars($fotoSpeaker, ENT_QUOTES);
    $sql = "INSERT INTO `speakers`( `ID_conf`, `name`, `photo`, `linkSP`) VALUES ($idconf,'$name','$fotoSpeaker','$link_speaker')";
    mysqli_query($connect, $sql);
    $_FILES['Foto_speaker'] = [];
    $_POST=[];
}
