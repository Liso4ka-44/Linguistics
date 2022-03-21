<?php 
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);

	require "php/render_template.php";

	session_start();
	if( isset($_SESSION['user']) ) {
		header("Location: /actions/exit.php");
	}

	$title = "Sign In/Sign Up";

	$content = renderTemplate("templates/sign_in.php");

	print($content);
?>