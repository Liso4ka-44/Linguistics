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

	$curid = $_GET['ID'];
	$suffix = $_GET['lang'];

	$conf_info = safety_db_query( $db_link, "SELECT * FROM conferences WHERE ID_conf = ?", "i", $curid )[0];
	$conception = $conf_info[ 'an_conception_'.$suffix ];
	$conf_name = $conf_info[ 'Name_conf_'.$suffix ];

	$info_announcement = $conf_info[ 'info_anons_'.$suffix ];
	$announcement_name = $conf_info[ 'anons_name_'.$suffix ];

	$conf_about = $conf_info[ 'info_'.$suffix ];

	$speakers = safety_db_query( $db_link, "SELECT * FROM speakers WHERE ID_conf = ?", "i", $curid );
	$reviews = safety_db_query( $db_link, "SELECT * FROM feedback WHERE ID_conf = ?", "i", $curid );

	$name_and_conception_template = renderTemplate( "templates/conf_info_red/name_and_conception.php", [ 'conf_info' => $conf_info, 'suffix' => $suffix ] );
	$announcement_template = renderTemplate( "templates/conf_info_red/announcement.php", [ 'conf_info' => $conf_info, 'suffix' => $suffix ] );
	$about_conf_template = renderTemplate( "templates/conf_info_red/about.php", [ 'conf_info' => $conf_info, 'suffix' => $suffix ] );
	$speakers_template = renderTemplate( "templates/conf_info_red/speakers.php", [ 'conf_info' => $conf_info, 'speakers' => $speakers, 'suffix' => $suffix ] );
	$reviews_template = renderTemplate( "templates/conf_info_red/reviews.php", [ 'conf_info' => $conf_info, 'reviews' => $reviews, 'suffix' => $suffix ] );

	$conf_date = safety_db_query( $db_link, "SELECT date_from FROM dates WHERE ID_conf = ? AND text_en REGEXP '^Conference [0-9]{4}$'", "i", $curid )[0]['date_from'];

	$nav = [
		['conf_announcement', 'Анонс'],
		['conf_info', 'Информация'],
		['conf_speakers', 'Спикеры'],
		['conf_feedback', 'Отзывы']
	];
	$nav_template = renderTemplate( "templates/nav_template.php", ['chapters' => $nav] );

	$content = renderTemplate( "templates/conf_info_red.php", [
		'conf_date' => $conf_date,
		'nav_template' => $nav_template,
		'name_and_conception_template' => $name_and_conception_template,
		'announcement_template' => $announcement_template,
		'about_conf_template' => $about_conf_template,
		'speakers_template' => $speakers_template,
		'reviews_template' => $reviews_template
	] );
	$CKEDITIOR_LINK = "https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js";
	$ojf = [$CKEDITIOR_LINK, 'js/nav_template.js'];
	$ocss = ['css/nav_template.css', 'css/conf_info_red.css'];
	
	$page = renderTemplate( "templates/layout.php", ['title' => 'title', 'content' => $content, 'opt_js_files' => $ojf, 'opt_css_files' => $ocss,
		'current_page' => 'Редактирование' ] );

	print($page);

?>