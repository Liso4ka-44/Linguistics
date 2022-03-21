<?php
	// Функция рендеринга шаблонов. 1-й аргумент - путь к файлу, 2-й - переменные для подстановке в формате ['мия_переменной_1'=>$переменная_1, 'имя_переменной_2'=>$переменная_2]
	function renderTemplate($tmp, $vars = []) {
	 	if(file_exists($tmp) ) { 
		 	ob_start();
		 	// Подстановка значений
		 	extract($vars);
		 	require $tmp; // Подключение файла шаблона
		 	return ob_get_clean();
		} else {
			throw new Exception("Can not render template. File ".$tmp." does not exist"); 
		}
	}
?>