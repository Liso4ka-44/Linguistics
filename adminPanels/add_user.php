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

	$message = '';
	$color = '#fff0';
	if( isset($_GET['status']) ) {
		if( $_GET['status'] == 'success' ) {
			$message = 'Пользователь успешно добавлен';
			$color = 'lightgreen';
		} else {
			$message = 'Не удалось добавить пользователя';
			if( isset( $_GET['reason'] ) ) {
				$message .= '</span><br><span>('.$_GET['reason'].")";
			}
			$color = 'red';
		}
	}

	$content = renderTemplate("templates/add_user.php", ['message' => $message, 'message_color' => $color ]);

	$op_css = [];
	$op_js = [];

	$layout = renderTemplate("templates/layout.php", ['title' => "Редактирование", 'current_page' => 'Редактирование', 
		'opt_css_files' => $op_css, 'opt_js_files' => $op_js, 'content' => $content]);

	print($layout);

?>