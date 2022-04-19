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

	$dates = [];
	
	$distance = 1;
	$count = 10;
	if( isset($_GET['distance']) ) {
		$distance = $_GET['distance'];
	}
	
	if( isset($_GET['count']) ) {
		$count = $_GET['count'];
	}

	$conf_id = $_GET['ID'];

	for( $i = 0; $i < $count; ++$i ) {
		array_push($dates, date( 'Y-m-d', strtotime('-'.$i*$distance.' days') ));
	}
	$dates = array_reverse($dates);


	$visit_count_params = "['Дата', 'Количество просмотров']";


	foreach ($dates as $date) {
		$response = json_decode(
				file_get_contents("https://api-metrika.yandex.net/stat/v1/data?metrics=ym:s:pageviews&date1=".$date."&date2=".$date."&filters=ym:pv:URLParamNameAndValue==%27id=".$conf_id."%27&id=86243536"), true 
		);
		$pageviews;
		if(!empty($response['data']) && !empty($response['data'][0]['metrics'])) {
			$pageviews = $response['data'][0]['metrics'][0];
		} else {
			$pageviews = 0;
		}
		$visit_count_params .= ", ['".$date."', ".$pageviews."]";
	}

	$content = renderTemplate( "templates/analythics/an_details.php", [ 'visit_count_params' => $visit_count_params ]);
	$all = renderTemplate("templates/layout.php", ['title' => "Аналитика", 'current_page' => 'Аналитика', 
		'opt_css_files' => [], 'opt_js_files' => [], 'content' => $content]);

	print($all);

?>