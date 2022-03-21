<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "php/mysql_connect.php";
	require "php/render_template.php";
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

	$confs = safety_db_query( $db_link, "SELECT * FROM conferences" );

	$date_from = date('Y-m-d', strtotime('-1 year'));
	$date_to = date('Y-m-d');

	if( isset($_GET['date_from']) ) {
		$date_from = $_GET['date_from'];
	}
	if( isset($_GET['date_to']) ) {
		$date_to = $_GET['date_to'];
	}

	$an_rows = '';

	$visit_count_params = "['Конференция', 'Колличество просмотров']";
	$rates_count_params = "['Конференция', 'Колличество оценок']";
	$mid_rate_params = "['Конференция', 'Средняя оценка']";

	foreach( $confs as $conf ) {
		$conf_id = $conf['ID_conf'];

		$response = json_decode(
				file_get_contents("https://api-metrika.yandex.net/stat/v1/data?metrics=ym:s:pageviews&date1=".$date_from."&date2=".$date_to."&filters=ym:pv:URLParamNameAndValue==%27id=".$conf_id."%27&id=86243536"), true 
		);
		$pageviews;
		if(!empty($response['data']) && !empty($response['data'][0]['metrics'])) {
			$pageviews = $response['data'][0]['metrics'][0];
		} else {
			$pageviews = 0;
		}

		$name = safety_db_query( $db_link, "SELECT date_from FROM dates WHERE ID_conf = ? AND text_en REGEXP '^Conference [0-9]{4}$'", "i",
		$conf_id )[0]['date_from'];

		$visit_count_params .= ", ['".$name."', ".$pageviews."]";


		$rating_count = safety_db_query( $db_link, "SELECT count(*) FROM feedback WHERE ID_conf = ?", "i", $conf_id )[0]['count(*)'];

		$avg_rating = safety_db_query( $db_link, "SELECT AVG(rating) FROM feedback WHERE ID_conf = ?", "i", $conf_id )[0]['AVG(rating)'];

		if( is_null($rating_count) ) {
			$rating_count = '-';
		}
		if( is_null($avg_rating) ) {
			$avg_rating = '-';
		}
		if( $name == '' ) {
			$name = '-';
		}

		$rates_count_params .= ", ['".$name."', ".($rating_count == '-' ? 0 : $rating_count)."]";
		$mid_rate_params .= ", ['".$name."', ".($avg_rating == '-' ? 0 : $avg_rating)."]";

		$an_rows .= renderTemplate( "templates/analythics/an_str.php", [ 
			'conf_id' => $conf_id,
			'conf_name' => $name, 
			'avg_rating' => $avg_rating, 
			'rating_count' => $rating_count, 
			'pageviews' => $pageviews 
		] );
	}

	$content = renderTemplate( "templates/analythics/analythics.php", [
		'an_rows' => $an_rows, 'visit_count_params' => $visit_count_params,
		'rates_count_params' => $rates_count_params, 'mid_rate_params' => $mid_rate_params,
		'date_from' => $date_from, 'date_to' => $date_to
	] );

	$all = renderTemplate("templates/layout.php", ['title' => "Аналитика", 'current_page' => 'Аналитика', 
		'opt_css_files' => [], 'opt_js_files' => [], 'content' => $content]);

	print($all);
?>