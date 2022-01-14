<?php
    include "../connect.php";
    if(!empty($_POST['url_video'] && $_POST['url_video']!="")){
        $_GET["id"]=$idm
		foreach($_POST['url_video'] as $key => $value){
			if(!empty($_POST['url_video'][$key])&&$_POST['url_video'][$key]!=""){
				$videoLink = explode('v=', $_POST['url_video'][$key], 2);
				$sql = "INSERT INTO `video_conf`( `video_conf`, `ID_conf`) VALUES ('$videoLink[1]',$idm)";
				mysqli_query($connect, $sql);			
			}						
		}
        header("Location:../video.php?id=".$_GET["id"]);
	}	
?>