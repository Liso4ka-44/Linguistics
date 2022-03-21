<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require_once "../../get_pb_path.php";
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

	if(!empty($_POST)) {
		$conf_id = $_POST['conf_id'];
		
		$folder_name;

		$photo_path = get_pb_path($conf_id, $db_link, $folder_name, "partners");		

		$photo_name = load_file( $_FILES['partner'], $photo_path );

		$photo_name = basename( $photo_name );

		$photo_fin_location = "konf/".$folder_name."/partners/".$photo_name;

		safety_db_query( $db_link, "INSERT INTO partners VALUES (NULL, ?, ?)", "si", $photo_fin_location, $conf_id );
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>