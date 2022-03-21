<?php
	include "../../mysql_connect.php";

	function get_pb_path( $conf_id, $db_link, &$folder_name, $folder_to_create = NULL ) {
		$folder_name = safety_db_query( $db_link, "SELECT date_from FROM dates WHERE ID_conf = ? AND text_en REGEXP 'Conference [0-9]{4}'", "i",
		$conf_id )[0]['date_from'];
		$folder_name = str_replace("-", ".", $folder_name);

		$full_path = "../../../konf/".$folder_name."/";

		if( !file_exists('../../../konf/'.$folder_name) ) {
			mkdir( '../../../konf/'.$folder_name, 0777, true );
		}

		if( !is_null($folder_to_create) ) {
			
			$full_path = $full_path.$folder_to_create."/";

			if( !file_exists('../../../konf/'.$folder_name."/".$folder_to_create) ) {
				mkdir( '../../../konf/'.$folder_name."/".$folder_to_create, 0777, true );
			}
		}

		return $full_path;
	}
?>