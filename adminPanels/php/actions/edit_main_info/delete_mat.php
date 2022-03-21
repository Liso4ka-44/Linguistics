<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require_once "../../get_pb_path.php";
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

		$mat_id = $_POST['mat_id'];
		$filename = safety_db_query( $db_link, "SELECT Road_to_documents, cover FROM el_collection WHERE ID_documents = ?", "i", $mat_id)[0];
		safety_db_query( $db_link, "DELETE FROM el_collection WHERE ID_documents = ?", "i", $mat_id );

		delete_file($db_link, 'el_collection', 'Road_to_documents', $filename['Road_to_documents'], "../../../../");
		delete_file($db_link, 'el_collection', 'cover', $filename['cover'], "../../../");

	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>