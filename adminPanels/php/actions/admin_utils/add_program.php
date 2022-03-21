<?php
	require "../../mysql_connect.php";
	require "../../load_file.php";

	function add_program( $db_link, $conf_id, $name_ru, $name_en, $file_ru, $file_en ) {

		$folder_name = safety_db_query( $db_link, "SELECT date_from FROM dates WHERE ID_conf = ? AND text_en REGEXP '^Conference [0-9]{4}$'", "i",
		$conf_id )[0]['date_from'];
		$folder_name = str_replace("-", ".", $folder_name);

		$full_path = "../../../konf/".$folder_name."/playbill/";

		if( !file_exists('../../../konf/'.$folder_name) ) {
			mkdir( '../../../konf/'.$folder_name, 0777, true );
		}
		if( !file_exists('../../../konf/'.$folder_name."/playbill") ) {
			mkdir( '../../../konf/'.$folder_name."/playbill", 0777, true );
		}


		$fname_ru = load_file($file_ru, $full_path);
		$fname_en = load_file($file_en, $full_path);

		$fname_ru = basename($fname_ru);
		$fname_en = basename($fname_en);

		$file_location = "/adminPanels/konf/".$folder_name."/playbill/";

		$file_ru_loc = $file_location.$fname_ru;
		$file_en_loc = $file_location.$fname_en;

		print("test");

		safety_db_query( $db_link, "INSERT INTO playbill VALUES (NULL, ?, ?, ?, ?, ?)", "ssssi",
			$name_ru, $name_en,
			$file_ru_loc, $file_en_loc,
			$conf_id );

	}
?>