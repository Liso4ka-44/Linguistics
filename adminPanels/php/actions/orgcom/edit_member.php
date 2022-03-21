<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "../../mysql_connect.php";
	require "../../load_file.php";
	
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

		$cur_id = $_POST['memb_id'];

		if( !empty($_POST['name_ru']) ) {
			safety_db_query( $db_link, "UPDATE committee SET name_per_ru = ? WHERE ID_per = ?", "si", $_POST['name_ru'], $cur_id );
		}

		if( !empty($_POST['name_en']) ) {
			safety_db_query( $db_link, "UPDATE committee SET name_per_en = ? WHERE ID_per = ?", "si", $_POST['name_en'], $cur_id );
		}

		if( !empty($_POST['post_ru']) ) {
			safety_db_query( $db_link, "UPDATE committee SET position_ru = ? WHERE ID_per = ?", "si", $_POST['post_ru'], $cur_id );
		}

		if( !empty($_POST['post_en']) ) {
			safety_db_query( $db_link, "UPDATE committee SET position_en = ? WHERE ID_per = ?", "si", $_POST['post_en'], $cur_id );	
		}

		if( !empty($_POST['link_ru']) ) {
			safety_db_query( $db_link, "UPDATE committee SET link_per_ru = ? WHERE ID_per = ?", "si", $_POST['link_ru'], $cur_id );
		}

		if( !empty($_POST['link_en']) ) {
			safety_db_query( $db_link, "UPDATE committee SET link_per_en = ? WHERE ID_per = ?", "si", $_POST['link_en'], $cur_id );	
		}

		if( !empty($_FILES['new_photo']) ) {
			
			// Delete old photo;

			// Loading photo
			$photo_path = "../../../orgcom/";

			if( !file_exists('../../../orgcom') ) {
				mkdir( '../../../orgcom', 0777, true );
			}

			$photo_name = load_file( $_FILES['new_photo'], $photo_path );

			$photo_name = basename( $photo_name );

			$photo_fin_location = "orgcom/".$photo_name;
			// -------------

			safety_db_query( $db_link, "UPDATE committee SET photo_per = ? WHERE ID_per = ?", "si", $photo_fin_location, $cur_id );	

		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>