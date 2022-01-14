<?php
    function name($key){
        $dict = $GLOBALS['dict'];
        if($dict[$key]){
            return $dict[$key];
        }
        else{
            return $key;
        }
    }
?>

