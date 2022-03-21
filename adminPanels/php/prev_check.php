<?php
	// Проверка привелегий пользователя	
	function prev_check($db_link, $accountId){
		if(session_status() != PHP_SESSION_ACTIVE)
			session_start();
		
		$prev = safety_db_query($db_link, "SELECT access_level FROM users WHERE ID_user = ?", 'i', $accountId );
		if($prev == false) {
			throw new Exception("No answer from MySQL", 1);
		}
		return (int)$prev[0]['access_level'];
	}
?>