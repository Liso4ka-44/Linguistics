<?php 
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "../php/mysql_connect.php";

	$db_link = connectToDB();

	session_start();

	$login = $_POST['login'];
	$name = $_POST['name'];
	$password = $_POST['password'];
	$ans = safety_db_query( $db_link, "SELECT * FROM users WHERE login = ? OR name_us = ?", "ss", $login, $login );
	if( empty($ans) ) {
		$pass_hash = password_hash($password, PASSWORD_DEFAULT);
		safety_db_query( $db_link, "INSERT INTO users VALUES (NULL, ?, ?, ?, NULL)", "sss", $name, $login, $pass_hash );
		$user_id = mysqli_insert_id( $db_link );
		session_start();
		$_SESSION['user'] = $user_id;
	}
	header("Location: /");
?>