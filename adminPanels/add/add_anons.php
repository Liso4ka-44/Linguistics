<?php
    if(!empty($_POST["Name_announcement"])&&$_POST["Name_announcement"]!=""&&!empty($_POST["info_announcement"])&&$_POST["info_announcement"]!=""&&!empty($_POST["date_announcement"])&&$_POST["date_announcement"]!=""&&!empty($_POST["timeStart"])&&$_POST["timeEnd"]!=""){
        include "../connect.php";
        $nameKonf=  htmlspecialchars($_POST["Name_announcement"], ENT_QUOTES);
        $infoKonf= htmlspecialchars($_POST["info_announcement"], ENT_QUOTES);
        $nameSpeaker= htmlspecialchars($_POST["Name_speaker_announcement"], ENT_QUOTES);
        $infoSpeaker =  htmlspecialchars($_POST["Info_speaker_announcement"], ENT_QUOTES);
        $fotoSpeaker="";
        $format="";
        $time=$_POST["timeStart"]."-".$_POST["timeEnd"];
        $date_announcement = date("d.m.Y",strtotime($_POST["date_announcement"]));
	    if(!empty($_FILES['Foto_speaker_announcement']['name']) && $_FILES['Foto_speaker_announcement']['name']!=""){
			$path = __DIR__ . "./../anons/$date_announcement/";
			if (!is_dir($path)) {
				mkdir($path, 0777, true);
			}
	    	$date_announcement = date("d.m.Y",strtotime($_POST["date_announcement"]));
	    	$dir = "./adminPanels/anons/$date_announcement/";
	    	$_FILES['Foto_speaker_announcement']['name'];
	    		$file_name = $_FILES['Foto_speaker_announcement']['name'];
	    		$file_tmp = $_FILES['Foto_speaker_announcement']['tmp_name'];
	    		$podborFormata = array(
	    			"image/jpeg" => "jpg",
	    			"image/png" => "png",
	    		);
	    	foreach($podborFormata as $key2 => $val){
	    		if ($key2 == $_FILES['Foto_speaker_announcement']['type']){
	    			$format = $val;
	    		}
	    	}
	    	if($format !=""){
				var_dump($file_name);
				var_dump($dir);
	    		move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . $dir.$file_name.'.'.$format.'');
	    	}
	    	$fotoSpeaker = $dir.$file_name;
            $fotoSpeaker = htmlspecialchars($fotoSpeaker, ENT_QUOTES);
	    }
        $sql = "INSERT INTO `announcement`(`announcement_Date`, `announcement_Time`, `announcement_Name_speaker`, `announcement_info_speaker`, `announcement_foto_speaker`, `announcement_name_konf`, `announcement_info_konf`) VALUES ('$date_announcement','$time','$nameSpeaker','$infoSpeaker','$fotoSpeaker','$nameKonf','$infoKonf')";
        mysqli_query($connect, $sql);
        $_POST=[];
    }
?>