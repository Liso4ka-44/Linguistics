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

		if( !empty($_POST['desc_ru']) ) {
			safety_db_query( $db_link, "UPDATE el_collection SET Name_documents_ru = ? WHERE ID_documents = ?", "si", $_POST['desc_ru'], $mat_id );
		}
		if( !empty($_POST['desc_en']) ) {
			safety_db_query( $db_link, "UPDATE el_collection SET Name_documents_en = ? WHERE ID_documents = ?", "si", $_POST['desc_en'], $mat_id );
		}
		if( !empty($_POST['elib_link']) ) {
			safety_db_query( $db_link, "UPDATE el_collection SET link = ? WHERE ID_documents = ?", "si", $_POST['elib_link'], $mat_id );
		}
		if( !empty($_FILES['file']) ) {
			$conf_id = $_POST['conf_id'];
			$folder_name;
			$full_path = get_pb_path( $conf_id, $db_link, $folder_name, "ellcollection" );
			
			$fname = load_file($_FILES['file'], $full_path);
			$fname = basename($fname);
			
			$file_location = "adminPanels/konf/".$folder_name."/ellcollection/";
			$file_fin_loc = $file_location.$fname;

			$filename = safety_db_query( $db_link, "SELECT Road_to_documents, cover FROM el_collection WHERE ID_documents = ?", "i", $mat_id)[0];
			
			safety_db_query($db_link, "UPDATE el_collection SET Road_to_documents = ? WHERE ID_documents = ?", "si", $file_fin_loc, $mat_id );

			delete_file($db_link, 'el_collection', 'Road_to_documents', $filename['Road_to_documents'], "../../../../");
		}

		if( !empty($_FILES['cover']) ) {
			$conf_id = $_POST['conf_id'];
			$folder_name;
			$full_path = get_pb_path( $conf_id, $db_link, $folder_name, "cover" );
			
			$fname = load_file($_FILES['cover'], $full_path);
			$fname = basename($fname);
			
			$file_location = "konf/".$folder_name."/cover/";
			$file_fin_loc = $file_location.$fname;
			
			$filename = safety_db_query( $db_link, "SELECT Road_to_documents, cover FROM el_collection WHERE ID_documents = ?", "i", $mat_id)[0];

			safety_db_query($db_link, "UPDATE el_collection SET cover = ? WHERE ID_documents = ?", "si", $file_fin_loc, $mat_id );

			delete_file($db_link, 'el_collection', 'cover', $filename['cover'], "../../../");
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>