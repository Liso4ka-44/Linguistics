<?php
include "../connect.php";
$id = $_POST["id"];
if(!empty($_POST['Name_feedback']) && $_POST['Name_feedback']!="" && !empty($_POST['info_feedback']) && $_POST['info_feedback']!=""){
    foreach($_POST['Name_feedback'] as $key => $val){
        $Name_feedback = htmlspecialchars($_POST['Name_feedback'][$key], ENT_QUOTES);
        $info_feedback = htmlspecialchars($_POST['info_feedback'][$key], ENT_QUOTES);
        $sql = "INSERT INTO `feedback`( `Name_feedback`,`feedback`, `ID_conf`) VALUES ('$Name_feedback','$info_feedback',$id)";
        mysqli_query($connect, $sql);
    }	
    header("Location:../feedback.php?id=".$id);
}
?>