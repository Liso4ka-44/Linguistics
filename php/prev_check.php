<?php
	// Проверка привелегий пользователя	
	function prev_check($accountId){
		if(session_status() != PHP_SESSION_ACTIVE)
			session_start();
		
		require_once $_SERVER['DOCUMENT_ROOT'].'/scripts/mysql_connect.php';
		$db_link; // БД
		try {
			$db_link = connectToDb();
		} catch (Exception $e) {
			echo "Exception: ". $e->getMessage().'\n';
		}
		$prev = safety_db_query($db_link, "SELECT prev FROM users WHERE ( id=? )", 'i', $accountId );
		if($prev == false) {
			throw new Exception("No answer from MySQL", 1);
		}
		return (int)$prev[0]['prev'];
	}
?>