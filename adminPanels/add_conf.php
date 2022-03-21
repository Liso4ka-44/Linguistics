<?php
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

	$content = renderTemplate( "templates/add_conf.php" );

	$CKEDITIOR_LINK = "https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js";
	$op_css = [];
	$op_js = [$CKEDITIOR_LINK];

	$layout = renderTemplate("templates/layout.php", ['title' => "Редактирование", 'current_page' => 'Редактирование', 
		'opt_css_files' => $op_css, 'opt_js_files' => $op_js, 'content' => $content]);

	print($layout);

?>