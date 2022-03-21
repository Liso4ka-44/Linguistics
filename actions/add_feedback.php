<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "../php/mysql_connect.php";
	require "../php/load_file.php";

	$db_link;

	try {
		$db_link = connectToDB();
	} catch (Exception $e) {
		print_r($e);
	};

	if(!empty($_POST)) {
		
		$suffix = $_POST['suffix'];
		$conf_id = $_POST['conf_id'];

		// suffix check here!

		$uid = $_POST['user_id'];
		$name = safety_db_query( $db_link, "SELECT name_us FROM users WHERE ID_user = ?", "i", $uid )[0]['name_us'];
		
		$position = $_POST['position'];
		$text = $_POST['text'];
		$rating = $_POST['rating'];

		safety_db_query( $db_link, 
			"INSERT INTO feedback  VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)", 
			"ssssssii", 
			$name, $name,
			$position, $position,
			$text, $text, 
			$conf_id, 
			$rating
		);

	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>