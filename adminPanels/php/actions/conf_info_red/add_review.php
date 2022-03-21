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

	if(!empty($_POST)) {
		var_dump($_POST);
		
		$suffix = $_POST['suffix'];
		$conf_id = $_POST['conf_id'];

		// suffix check here!

		$name = $_POST['name'];
		$position = $_POST['position'];
		$rating = $_POST['rating'];
		$text = $_POST['text'];

		safety_db_query( $db_link, 
			"INSERT INTO feedback ( Name_feedback_ru, Name_feedback_en, post_ru, post_en, feedback_ru, feedback_en, ID_conf, rating ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)", 
			"ssssssii", 
			$name, $name, $position, $position, $text, $text, $conf_id, $rating
		);

	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>