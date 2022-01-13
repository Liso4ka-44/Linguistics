<?php
if($_SESSION['aut']!=true){
    ob_end_clean();
    header('Location: ../index.php');
}
?>