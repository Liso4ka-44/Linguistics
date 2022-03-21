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
		
		$suffix = $_POST['suffix'];
		$feedback_id = $_POST['id_feedback'];

		// suffix check here!

		$name = $_POST['name'];
		$position = $_POST['position'];
		$text = $_POST['text'];
		$rating = $_POST['rating'];
		safety_db_query( $db_link, 
			"UPDATE feedback SET rating = ?, Name_feedback_".$suffix." = ?, post_".$suffix." = ?, feedback_".$suffix." = ? WHERE ID_feedback = ?", 
			"isssi", 
			$rating, $name, $position, $text, $feedback_id
		);

	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>