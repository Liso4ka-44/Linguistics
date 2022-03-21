<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require_once "get_pb_path.php";
	require_once "mysql_connect.php";

	require_once "prev_check.php";

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

	function cascade_delete($db_link, $conf_id)
	{
		safety_db_query( $db_link, "DELETE FROM dates WHERE ID_conf = ?", "i", $conf_id);
		safety_db_query( $db_link, "DELETE FROM el_collection WHERE ID_conf = ?", "i", $conf_id);
		safety_db_query( $db_link, "DELETE FROM feedback WHERE ID_conf = ?", "i", $conf_id);
		safety_db_query( $db_link, "DELETE FROM partners WHERE ID_conf = ?", "i", $conf_id);
		safety_db_query( $db_link, "DELETE FROM photo_conf WHERE ID_conf = ?", "i", $conf_id);
		safety_db_query( $db_link, "DELETE FROM playbill WHERE ID_conf = ?", "i", $conf_id);
		safety_db_query( $db_link, "DELETE FROM speakers WHERE ID_conf = ?", "i", $conf_id);
		safety_db_query( $db_link, "DELETE FROM conferences WHERE ID_conf = ?", "i", $conf_id);

	}

	function recursiveRemoveDir($dir) {
		if (!file_exists($dir) || !is_dir($dir)) {
		 	return;
		}
		chmod($dir, 0777 );
		$includes = glob($dir.'/*');
			foreach ($includes as $include) {
				if(is_dir($include)) {
					recursiveRemoveDir($include);
				} else {
					unlink($include);
				}
		}
		rmdir($dir);
	}

	if(!empty($_POST)) {
		$conf_id = $_POST['conf_id'];
		$folder_name = safety_db_query( $db_link, "SELECT date_from FROM dates WHERE ID_conf = ? AND text_en REGEXP 'Conference [0-9]{4}'", "i",
		$conf_id )[0]['date_from'];
		$folder_name = str_replace("-", ".", $folder_name);
		var_dump($conf_id);
		try {
			cascade_delete( $db_link, $conf_id );
		} catch (Exception $e) {
			//header("Location: ".$_SERVER['HTTP_REFERER']."?status=failure");	
		}
		try {
			recursiveRemoveDir('../konf/'.$folder_name);
		} catch (Exception $e) {
			
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>