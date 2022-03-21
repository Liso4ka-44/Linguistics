<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require_once "../../mysql_connect.php";
	require_once "../../load_file.php";

	require "../../delete_file.php";

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
		$photo_id = $_POST['photo_id'];
		
		$filename = safety_db_query( $db_link, "SELECT photo_conf FROM photo_conf WHERE ID_photo = ?", "i", $photo_id)[0]['photo_conf'];
		safety_db_query( $db_link, "DELETE FROM photo_conf WHERE ID_photo = ?", "i", $photo_id );

		delete_file($db_link, 'photo_conf', 'photo_conf', $filename, "../../../");
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>