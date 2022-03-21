<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require_once "../../mysql_connect.php";
	require_once "../../load_file.php";

	require '../../delete_file.php';

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
		$partner_id = $_POST['partner_id'];
		
		$partner_logo = safety_db_query( $db_link, "SELECT logo FROM partners WHERE ID_partner = ?", "i", $partner_id )[0]['logo'];

		safety_db_query( $db_link, "DELETE FROM partners WHERE ID_partner = ?", "i", $partner_id );

		delete_file($db_link, 'partners', 'logo', $partner_logo, "../../../");
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>