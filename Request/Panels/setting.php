<?php
    session_start();
    include "regprov.php";
    include "connect.php";
    if($_SESSION['status'] == 'admin' && $_GET['re']=='nS'){
        if(!empty($_GET['numberS']) && !empty($_GET['select'])){
            $status = (int) $_GET['select'];
            $numberRequest = (int) $_GET['numberS'];
            $sql ="UPDATE `request` SET `Status` = $status WHERE `request`.`№` = $numberRequest ";
            mysqli_query($connect,$sql);
        }
    }
    if($_GET['re'] == 'dR'){
        $number = (int) $_GET['numberReq'];
        $Request = mysqli_query($connect,"SELECT `№`,`IdRequestUsers`,`Article` FROM `request` WHERE `№` = $number");
        $request = mysqli_fetch_assoc($Request); 
        if($request['IdRequestUsers'] == $_SESSION['id'] || $_SESSION['status'] =='admin'){
            if(!empty($request['Article']) && $request['Article']!=''){
                if (file_exists(__DIR__.$request['Article'])) {
                    if(unlink($_SERVER['DOCUMENT_ROOT']."/Request/Panels$request[Article]")){
                        echo 'файл удален';
                    }
                }
            }
            $RequestUsers = mysqli_query($connect,"DELETE FROM `request` WHERE `№` = $number");
        }
    }
    ob_end_clean();
    header('Location: ../index.php');
?>


    
