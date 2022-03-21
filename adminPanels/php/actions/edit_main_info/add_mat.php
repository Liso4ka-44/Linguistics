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

		$cover_path = get_pb_path($conf_id, $db_link, $folder_name, "cover");
		$mat_path = get_pb_path($conf_id, $db_link, $folder_name, "ellcollection");

		$desc_ru = $_POST['desc_ru'];
		$desc_en = $_POST['desc_en'];

		$elib_linck = $_POST['elib_link'];
		

		print($cover_path." ".$mat_path);

		$covname = load_file( $_FILES['cover'], $cover_path );
		$fname = load_file( $_FILES['file'], $mat_path );

		$covname = basename( $covname );
		$fname = basename( $fname );

		$cover_fin_location = "konf/".$folder_name."/cover/".$covname;
		$file_fin_location = "adminPanels/konf/".$folder_name."/ellcollection/".$fname;

		safety_db_query( $db_link, "INSERT INTO el_collection VALUES (NULL, ?, ?, ?, ?, ?, ?)", "sssiss", 
			$desc_ru, $desc_en,
			$file_fin_location,
			$conf_id,
			$cover_fin_location,
			$elib_linck 
		);
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>