<?php
   
// Инициализируем сессию.
// Если вы используете session_name("something"), не забудьте добавить это перед session_start()!
session_start();

// Удаляем все переменные сессии.
$_SESSION = array();

// Если требуется уничтожить сессию, также необходимо удалить сессионные cookie.
// Замечание: Это уничтожит сессию, а не только данные сессии!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Наконец, уничтожаем сессию.
session_destroy();


    ob_end_clean(); 
    header('Location: ../index.php');
?>