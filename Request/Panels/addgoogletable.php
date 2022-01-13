<?php
    session_start();
    include "regprov.php";
    include "connect.php";
    if($_SESSION['status'] == 'admin' && $_SESSION['status'] != 'user'){
        if($_GET['table']=='add'){
            var_dump($_POST);
            $url =  htmlspecialchars($_POST["url"], ENT_QUOTES);
            if($_POST["year"]!=""){
                $year =  htmlspecialchars($_POST["year"], ENT_QUOTES);
            }
            $sql ="INSERT INTO `googleforms`(`year`, `url`) VALUES ('$year','$url')";
            mysqli_query($connect,$sql);
        }
        elseif($_GET['table']=='del'){
            $id =  (int) $_GET["id"];
            var_dump($id);var_dump($_GET['table']);
            $sql ="DELETE FROM `googleforms` WHERE `№` = $id ";
            mysqli_query($connect,$sql);
        }
    }
    ob_end_clean();
    header('Location: ../index.php');
?>