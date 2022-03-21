<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "../../mysql_connect.php";

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
		try {
			$filename = safety_db_query( $db_link, "SELECT road_ru, road_en FROM playbill WHERE ID_playbill = ?", "i", $_POST['prog_id'])[0];

			safety_db_query($db_link, "DELETE FROM playbill WHERE ID_playbill = ?", "i", $_POST['prog_id'] );

			delete_file($db_link, 'playbill', 'road_ru', $filename['road_ru'], "../../../../");
			delete_file($db_link, 'playbill', 'road_en', $filename['road_en'], "../../../../");
		} catch (Exception $e) {
			print_r($e);
		};
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>