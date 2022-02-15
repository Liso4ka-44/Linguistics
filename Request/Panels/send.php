<?php
    session_start();
	$connect = mysqli_connect("localhost","linguistics","fKI0xHbILCDUWa","host__linguistics_mgimo_ru__00");
    mysqli_set_charset($connect, 'utf8');
    if($_POST["Login"] != "" && $_POST["Password"] != ""){
    	$login = htmlspecialchars($_POST["Login"]);
    	$password = htmlspecialchars($_POST["Password"]);
    	$RequestUsers = mysqli_query($connect,"SELECT `IdRequestUsers`, `Login`, `Password`, `Status`  FROM `requestusers` WHERE `Login` = '$login'");
        $row = mysqli_fetch_assoc($RequestUsers); 
    	if(password_verify($password,$row["Password"])==true){
        	$_SESSION['aut'] = true;
            $_SESSION['id'] = $row ["IdRequestUsers"];
            $_SESSION['status'] = $row ["Status"];
			if($_SESSION['status']=='admin'){
				$list='list';
			  }
			  else{
				$list='listus';
			  }
			  ob_end_clean();
			header("Location: $list.php");
    	}
    	else{
        	$_SESSION=[];
			ob_end_clean();
			header('Location: ../index.php');
    	}
    }
	?>