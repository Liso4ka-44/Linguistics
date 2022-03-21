<?php
	function delete_file ($db_link, $table_name, $column_name, $path_to_file, $path_prefix = '') {
		$ans = safety_db_query( $db_link, "SELECT * FROM ".$table_name." WHERE ".$column_name." = ?", 's', $path_to_file );
		if( empty($ans) ) {
			unlink($path_prefix.$path_to_file);
		}
	}
?>