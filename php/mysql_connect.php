<?php
	// Функция полключения к БД. Возвращает ссылку на базу данных
	function connectToDB($server="localhost", $user="root", $password="", $dbname="mgimonew"){
		$db_link = mysqli_connect($server, $user, $password, $dbname);
		if($db_link == false)
			throw new Exception("Error connection databse", 1);
		return $db_link;
	}

	// Функция запроса к БД. Возвращает ответ от БД либо в виде ассоциативного массива, либо bool
	function safety_db_query($dblink, $sql_str, $argstr = '', ...$args){
		$result = mysqli_prepare($dblink, $sql_str); // Подгатовка запроса
		if(!$result){
			throw new Exception("Wrong sql request");
		}
		if($argstr != '')
			mysqli_stmt_bind_param($result, $argstr, ...$args); // Установка параметров
		mysqli_stmt_execute($result); // Выполнение запроса
		$answer = mysqli_stmt_get_result($result); // Получение ответа
		$retAns = [];
		if(gettype($answer) != "boolean" ){
			$retAns = mysqli_fetch_all($answer, MYSQLI_ASSOC); // Ответ в виде ассоциативного массива
		} else {
			$retAns = $answer;
		}
		mysqli_stmt_close($result);
		$err = mysqli_errno($dblink); // Получение ошибок (если были)
		if($err){
			throw new Exception(mysql_errno($err));
		}
		return $retAns;
	}
