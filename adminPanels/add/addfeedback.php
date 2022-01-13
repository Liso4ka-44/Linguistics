<?php
include "../connect.php";
if(!empty($_POST['Name_feedback']) && $_POST['Name_feedback']!="" && !empty($_POST['info_feedback']) && $_POST['info_feedback']!=""){
	$lastKonfID = $_GET['id'];
	$Name_feedback = htmlspecialchars($_POST['Name_feedback'], ENT_QUOTES);
	$info_feedback = htmlspecialchars($_POST['info_feedback'], ENT_QUOTES);
	$sql = "INSERT INTO `feedback`( `Name_feedback`,`feedback`, `ID_conf`) VALUES ('$Name_feedback','$info_feedback',$lastKonfID)";
	mysqli_query($connect, $sql);
	}
?>