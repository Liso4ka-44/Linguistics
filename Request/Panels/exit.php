<?php
    session_start();
    $_SESSION = [];
    ob_end_clean(); 
    header('Location: ../index.php');
?>