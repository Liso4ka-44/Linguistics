<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "../../mysql_connect.php";

	require_once "../../prev_check.php";

	$db_link;

	try {
		$db_link = connectToDB();
	} catch (Exception $e) {
		header("Location: ".$_SERVER['HTTP_REFERER']."?status=failure");
	}

	session_start();

	if( !isset($_SESSION['user']) ) {
		header("Location: /sign_in.php");
	}
	try {
		$prev = prev_check($db_link, $_SESSION['user']);
		if ($prev != 1) {
			header("Location: /sign_in.php");
		}
	} catch (Exception $e) {
		header("Location: /sign_in.php");
	}
	
	try {
		$db_link = connectToDB();
	} catch (Exception $e) {
		print_r($e);
	};
	if(!empty($_POST)) {
		if( empty($_POST['begin_date']) || empty($_POST['end_date'])
		|| empty($_POST['text_en']) || $_POST['text_ru'] 
		|| empty($_POST['conf_id']) ) {
			
			//error
		}
		$date_from = str_replace("-", '', $_POST['begin_date']);
		$date_to = str_replace("-", '', $_POST['end_date']);
		try {
			safety_db_query($db_link, "INSERT INTO dates VALUES (NULL, ?, ?, ?, ?, ?)", "iissi", 
				$date_from, $date_to, $_POST['text_ru'], $_POST['text_en'], $_POST['conf_id'] );
		} catch (Exception $e) {
			print_r($e);
		};
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>