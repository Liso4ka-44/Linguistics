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
		$prog_id = $_POST['prog_id'];

		if( !empty($_POST['name_ru']) ) {
			safety_db_query( $db_link, "UPDATE playbill SET name_playbill_ru = ? WHERE ID_playbill = ?", "si", $_POST['name_ru'], $prog_id );
		}
		if( !empty($_POST['name_en']) ) {
			safety_db_query( $db_link, "UPDATE playbill SET name_playbill_en = ? WHERE ID_playbill = ?", "si", $_POST['name_en'], $prog_id );
		}
		if( !empty($_FILES['file_ru']) ) {
			$conf_id = $_POST['conf_id'];
			$folder_name;
			$full_path = get_pb_path( $conf_id, $db_link, $folder_name, "playbill" );
			
			$fname = load_file($_FILES['file_ru'], $full_path);		
			$fname = basename($fname);
			
			$file_location = "adminPanels/konf/".$folder_name."/playbill/";
			$file_fin_loc = $file_location.$fname;
			
			$filename = safety_db_query( $db_link, "SELECT road_ru, road_en FROM playbill WHERE ID_playbill = ?", "i", $_POST['prog_id'])[0];

			safety_db_query($db_link, "UPDATE playbill SET road_ru = ? WHERE ID_playbill = ?", "si", $file_fin_loc, $prog_id );

			delete_file($db_link, 'playbill', 'road_ru', $filename['road_ru'], "../../../../");


		}
		if( !empty($_FILES['file_en']) ) {
			$conf_id = $_POST['conf_id'];
			$folder_name;
			$full_path = get_pb_path( $conf_id, $db_link, $folder_name, "playbill" );
			
			$fname = load_file($_FILES['file_en'], $full_path);		
			$fname = basename($fname);
			
			$file_location = "adminPanels/konf/".$folder_name."/playbill/";
			$file_fin_loc = $file_location.$fname;
			
			$filename = safety_db_query( $db_link, "SELECT road_ru, road_en FROM playbill WHERE ID_playbill = ?", "i", $_POST['prog_id'])[0];
			
			safety_db_query($db_link, "UPDATE playbill SET road_en = ? WHERE ID_playbill = ?", "si", $file_fin_loc, $prog_id );

			delete_file($db_link, 'playbill', 'road_en', $filename['road_en'], "../../../../");
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>