<?php 
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "../php/mysql_connect.php";

	$db_link = connectToDB();

	session_start();

	$login = $_POST['login'];
	$password = $_POST['password'];
	$ans = safety_db_query( $db_link, "SELECT * FROM users WHERE login = ? OR name_us = ?", "ss", $login, $login );
	if( !empty($ans) ) {
		foreach( $ans as $a ) {
			$result = password_verify($password, $a['password']);
			if( $result ) {
				$_SESSION['user'] = $a['ID_user'];

				if( $a['access_level'] == 1 ) {
					header("Location: /adminPanels/");
					exit();
				}

				break;
			}
		}
	}
	header("Location: /");
?>