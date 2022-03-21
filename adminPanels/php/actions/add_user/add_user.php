<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "../../mysql_connect.php";
	require "../../load_file.php";

	require_once "../../prev_check.php";

	$db_link;

	try {
		$db_link = connectToDB();
	} catch (Exception $e) {
		header("Location: ".$_SERVER['HTTP_REFERER']."?status=failure");
		exit();
	}

	session_start();

	if( !isset($_SESSION['user']) ) {
		header("Location: /sign_in.php");
		exit();
	}
	try {
		$prev = prev_check($db_link, $_SESSION['user']);
		if ($prev != 1) {
			header("Location: /sign_in.php");
			exit();
		}
	} catch (Exception $e) {
		header("Location: /sign_in.php");
		exit();
	}

	if(!empty($_POST)) {
		try {
			$name = $_POST['name'];
			$login = $_POST['login'];
			$password = $_POST['password'];
			$access_level = $_POST['access_level'];

			$existing_user = safety_db_query( $db_link, "SELECT * FROM users WHERE login = ?", 's', $login );

			var_dump($existing_user);

			if( count($existing_user) != 0 ) {
				header("Location: ../../../add_user.php?status=failure&reason='login already exists'" );	

			} else {
				safety_db_query( $db_link, 
					"INSERT INTO users VALUES (NULL, ?, ?, ?, ?)", 
					"sssi", 
					$name, $login, password_hash($password, PASSWORD_DEFAULT), $access_level
				);
				header("Location: ../../../add_user.php?status=success");
				exit();
			}
		} catch ( Exception $e ) {
			header("Location: ../../../add_user.php?status=failure&reason='Exception occured'" );		
			exit();
		}
	}
	header("Location: ../../../add_user.php?status=failure&reason='empty request'");
?>