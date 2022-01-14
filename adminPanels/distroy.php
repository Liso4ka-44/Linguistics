<?php
	session_start();
	session_unset();
	session_destroy();
	exit("<meta http-equiv='refresh' content='0; url= ../index.php'>");
?>