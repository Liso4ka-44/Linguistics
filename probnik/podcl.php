<?php
    if($_GET["lang"]){
        $_SESSION["lang"] = $_GET["lang"];
        $date = time() + 30*24*60*60;
        setcookie("lang", $_GET["lang"], $date);
    }
    elseif ($_COOKIE["lang"]) {
        $_SESSION["lang"] = $_COOKIE["lang"];
    }
    else{
        $_SESSION["lang"] = "ru";
    }
    $dict = include $_SESSION["lang"].".php";
?>