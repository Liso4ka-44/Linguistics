<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "php/render_template.php";
	require "php/mysql_connect.php";
	require "php/prev_check.php";


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
	

	$answer;
	$curid = $_GET['ID'];

	try {
		$answer = safety_db_query($db_link, "SELECT * FROM conferences WHERE ID_conf = ?", 'i', $curid);
	} catch (Exception $e) {
		print_r($e);
	}


	$conf_info = safety_db_query( $db_link, "SELECT * FROM conferences WHERE ID_conf = ?", "i", $curid )[0];

	$conf_date = safety_db_query( $db_link, "SELECT * FROM dates WHERE ID_conf = ? AND text_en REGEXP '^Conference [0-9]{4}$'", "i", $curid )[0];
	$dates = safety_db_query( $db_link, "SELECT * FROM dates WHERE ID_conf = ? AND text_en NOT REGEXP '^Conference [0-9]{4}$'", "i", $curid );
	$prog_letters = safety_db_query( $db_link, "SELECT * FROM playbill WHERE ID_conf = ?", "i", $curid );
	$mats = safety_db_query( $db_link, "SELECT * FROM el_collection WHERE ID_conf = ?", "i", $curid );
	$main_photo = $conf_info['main_photo'];
	$conf_photos = safety_db_query( $db_link, "SELECT * FROM photo_conf WHERE ID_conf = ?", "i", $curid );
	$conf_videos = safety_db_query( $db_link, "SELECT * FROM video_conf WHERE ID_conf = ?", "i", $curid );
	$partners = safety_db_query( $db_link, "SELECT * FROM partners WHERE ID_conf = ?", "i", $curid );

	$chapters = [
		['dates', 'Даты'],
		['programs', 'Программки'],
		['mats_list', 'Сборники материалов'],
		['photos', 'Фотографии'],
		['videos', 'Видео'],
		['partners', 'Партнёры']
	];
	$shortcuts_template = renderTemplate( "templates/nav_template.php", ['chapters' => $chapters] );


	$imp_dates = renderTemplate( "templates/edit_main_info/important_dates.php", ['dates' => $dates, 'conf_id' => $curid ]);
	$progs_inf_lets = renderTemplate( "templates/edit_main_info/progs_info_letters.php", ['programs' => $prog_letters, 'conf_id' => $curid ] );
	$mats_template = renderTemplate( "templates/edit_main_info/mats.php", [ 'mats' => $mats, 'conf_id' => $curid ] );
	$photos_template = renderTemplate( "templates/edit_main_info/photos.php", [ 'main_photo' => $main_photo, 'conf_photos' => $conf_photos, 'conf_id' => $curid ] );
	$videos_template = renderTemplate( "templates/edit_main_info/videos.php", [ 'conf_videos' => $conf_videos, 'conf_id' => $curid ] );
	$partners_template = renderTemplate( "templates/edit_main_info/partners.php", [ 'partners' => $partners, 'conf_id' => $curid ] );

	$content = renderTemplate("templates/main_info_red.php", [ 'mdid' => $conf_date['ID_date'], 'begin_date' => $conf_date['date_from'], 'end_date' => $conf_date['date_to'],
		'shortcuts_template' => $shortcuts_template,
		'important_dates_template' => $imp_dates,
		'programs_info_letters_template' => $progs_inf_lets,
		'mats_template' => $mats_template,
		'photos_template' => $photos_template,
		'videos_template' => $videos_template,
		'partners_template' => $partners_template ]);

	$op_css = ['css/main_info_red.css', 'css/nav_template.css'];
	$op_js = ['js/main_info_red.js', 'js/nav_template.js'];

	$layout = renderTemplate("templates/layout.php", ['title' => "Редактирование", 'current_page' => 'Редактирование', 
		'opt_css_files' => $op_css, 'opt_js_files' => $op_js, 'content' => $content]);

	print($layout);

?>