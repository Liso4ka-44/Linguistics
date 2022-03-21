<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require_once "../admin_utils/add_program.php";
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

		// Creating conference

		$begin_date = $_POST['begin_date'];
		$end_date = $_POST['end_date'];

		$year = substr($begin_date, 0, 4);
		$year_id = safety_db_query( $db_link, "SELECT ID_year FROM years WHERE year = ?", "s", $year );
		if( count($year_id) == 0 ) {
			safety_db_query( $db_link, "INSERT INTO years VALUES (NULL, ?)", "s", $year );
			$year_id = safety_db_query( $db_link, "SELECT ID_year FROM years WHERE year = ?", "s", $year );
		}
		$year_id = $year_id[0]['ID_year'];

		$conf_name_ru = "Конференция ".$year;
		$conf_name_en = "Conference ".$year;

		$intro_ru = $_POST['intro_ru'];
		$intro_en = $_POST['intro_en'];

		$conf_info_ru = $_POST['conf_info_ru'];
		$conf_info_en = $_POST['conf_info_en'];

		$conf_conception_ru = $_POST['conf_conception_ru'];
		$conf_conception_en = $_POST['conf_conception_en'];

		// name_ru, name_en 
		// ID_year
		// info_ru, info_en
		// photo
		// anons_name_ru, anons_name_en
		// info_anons_ru, info_anons_en
		// an_conception_ru, an_conception_en

		safety_db_query( $db_link, "INSERT INTO conferences VALUES (NULL, 
			?, ?,  
			?,
			'', '',
			'', 
			?, ?,
			?, ?,
			?, ? )", 
			"ssissssss",
			$conf_name_ru, $conf_name_en,
			$year_id,
			$intro_ru, $intro_en,
			$conf_info_ru, $conf_info_en,
			$conf_conception_ru, $conf_conception_en
		 );

		$conf_id = mysqli_insert_id( $db_link );
		var_dump($conf_id);

		// Inserting date

		safety_db_query( $db_link, "INSERT INTO dates VALUES (NULL, ?, ?, ?, ?, ?)", "ssssi", 
			$begin_date, $end_date, $conf_name_ru, $conf_name_en, $conf_id
		);

		// Inserting playbills

		$fname_ru_arr = $_POST['fname_ru'];
		$fname_en_arr = $_POST['fname_en'];

		$file_ru_arr = $_FILES['file_ru'];
		$file_en_arr = $_FILES['file_en'];

		$progs_count = count($fname_en_arr);

		var_dump($file_ru_arr['name']);

		for( $i = 0; $i < $progs_count; ++$i ) {
			$tmp_file_ru = ['name' => $file_ru_arr['name'][$i], 'tmp_name'=>$file_ru_arr['tmp_name'][$i]];
			$tmp_file_en = ['name' => $file_en_arr['name'][$i], 'tmp_name'=>$file_en_arr['tmp_name'][$i]];
			add_program( $db_link, $conf_id, $fname_ru_arr[$i], $fname_en_arr[$i], $tmp_file_ru, $tmp_file_en );
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
?>