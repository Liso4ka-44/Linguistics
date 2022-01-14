<?php
    session_start();
      include('../connect.php');
    if($_POST["login"]!='' &&$_POST["password"]!=""){
    	$login = $_POST["login"];
    	$password = $_POST["password"];
    	$us_bd = mysqli_query($connect,"SELECT * FROM `users` WHERE `login` = '$login'");
    	$us_bd = mysqli_fetch_assoc($us_bd);
    	if(password_verify($password, $us_bd["password"])==true){
        	$_SESSION['aut'] = true;
			//header("Location:anonslist.php");	
			
    	}
    	else{
        	$_SESSION=[];
    	}
    }
?>
