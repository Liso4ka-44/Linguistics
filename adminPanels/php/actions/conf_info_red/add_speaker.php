<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "../../mysql_connect.php";
	require "../../load_file.php";
	require "../../get_pb_path.php";

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
		$conf_id = $_POST['conf_id'];

		// suffix check here!

		$name = $_POST['name'];
		$link = $_POST['link'];
		$info = $_POST['info'];

		$folder_name;

		$photo_path = get_pb_path($conf_id, $db_link, $folder_name, "speakers");		

		$photo_name = load_file( $_FILES['photo'], $photo_path );

		$photo_name = basename( $photo_name );

		$photo_fin_location = "konf/".$folder_name."/speakers/".$photo_name;

		safety_db_query( $db_link, "INSERT INTO speakers VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)", "isssssss",
			$conf_id,
			$name, $name,
			$photo_fin_location,
			$link, $link,
			$info, $info
		);
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>