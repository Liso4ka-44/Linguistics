<?php
	session_start();
	if( isset($_SESSION['user']) ) {
		$_SESSION['user'] = NULL;
	}

	header("Location: /");
?>