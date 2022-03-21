<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require_once "../../mysql_connect.php";
	require_once "../../load_file.php";

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


	// https://www.youtube.com/watch?v=thcGDmBS9_o
	if(!empty($_POST)) {
		$conf_id = $_POST['conf_id'];
		$video_link = $_POST['video'];

		$fin_lnk = substr(parse_url($video_link)['query'], 2);

		safety_db_query( $db_link, "INSERT INTO video_conf VALUES (NULL, ?, ?)", "si", $fin_lnk, $conf_id );
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>