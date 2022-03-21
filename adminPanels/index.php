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


	function cmp_confs($a, $b) {
		if( $a['date'] == $b['date'] ) {
			return 0;
		}
		return $a['date'] < $b['date'] ? -1 : 1;
	}

	$confs_info = safety_db_query( $db_link, "SELECT * FROM conferences" );
	$confs = [];
	foreach ( $confs_info as $c_inf ) {
		$c_id = $c_inf['ID_conf'];
		$c_date = safety_db_query( $db_link, "SELECT * FROM dates WHERE ID_conf = ? AND text_en REGEXP '^Conference [0-9]{4}$'",
			 "i", $c_id )[0]['date_from'];
		array_push($confs, ['date' => $c_date, 'id' => $c_id]);
	}


	usort($confs, 'cmp_confs');
	
	$confs_templates = [];
	foreach ($confs as $conf) {
		$c = renderTemplate( 'templates/redact_conf/conf.php', [ 'conf_date' => $conf['date'], 'conf_id'=>$conf['id'] ] );
		array_push($confs_templates, $c);
	}
	$content = renderTemplate( 'templates/redact_conf.php', ['confs' => $confs_templates] );

	$op_css = [];
	$op_js = [];

	$layout = renderTemplate("templates/layout.php", ['title' => "Редактирование", 'current_page' => 'Редактирование', 
		'opt_css_files' => $op_css, 'opt_js_files' => $op_js, 'content' => $content]);

	print($layout);

?>