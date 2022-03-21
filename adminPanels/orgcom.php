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
	
	$members = [];
	$members_data = safety_db_query( $db_link, "SELECT * FROM committee" );
	foreach( $members_data as $memb_data ) {
		$m = renderTemplate( "templates/orgcom/member.php", [ 
			'memb_id' => $memb_data['ID_per'],
			'name_ru' => $memb_data['name_per_ru'],
			'name_en' => $memb_data['name_per_en'],
			'photo_src' => $memb_data['photo_per'],
			'post_ru' => $memb_data['position_ru'],
			'post_en' => $memb_data['position_en'],
			'link_ru' => $memb_data['link_per_ru'],
			'link_en' => $memb_data['link_per_en']
		] );
		array_push($members, $m);
	}

	$content = renderTemplate( "templates/orgcom.php", ['member_templates' => $members] );

	$op_css = [];
	$op_js = [];

	$layout = renderTemplate("templates/layout.php", ['title' => "Редактирование", 'current_page' => 'Редактирование', 
		'opt_css_files' => $op_css, 'opt_js_files' => $op_js, 'content' => $content]);

	print($layout);

?>