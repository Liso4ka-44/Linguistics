<?php
include "../connect.php";
if($_GET['update']=='up_name_ru'){
    $sql = "UPDATE `committee` SET `name_per_ru`= '".$_POST["name_ru"]."' WHERE `ID_per` = ".$_GET["ID_per"];
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../orgcom.php';</script>"; 
}

if($_GET['update']=='up_name_en'){
    $sql = "UPDATE `committee` SET `name_per_en`= '".$_POST["name_en"]."' WHERE `ID_per` = ".$_GET["ID_per"];
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../orgcom.php';</script>"; 
}

if($_GET['update']=='up_post_ru'){
    $sql = "UPDATE `committee` SET `position_ru`= '".$_POST["post_ru"]."' WHERE `ID_per` = ".$_GET["ID_per"];
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../orgcom.php';</script>"; 
}

if($_GET['update']=='up_post_en'){
    $sql = "UPDATE `committee` SET `position_en`= '".$_POST["post_en"]."' WHERE `ID_per` = ".$_GET["ID_per"];
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../orgcom.php';</script>"; 
}

if($_GET['update']=='up_link_ru'){
    $sql = "UPDATE `committee` SET `link_per_ru`= '".$_POST["link_ru"]."' WHERE `ID_per` = ".$_GET["ID_per"];
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../orgcom.php';</script>"; 
}

if($_GET['update']=='up_link_en'){
    $sql = "UPDATE `committee` SET `link_per_en`= '".$_POST["link_en"]."' WHERE `ID_per` = ".$_GET["ID_per"];
    mysqli_query($connect, $sql);
    echo "<script> document.location.href='../orgcom.php';</script>"; 
}

if($_GET['update']=='up_photo'){
    if(!empty($_FILES['photo']['name'])){
      $id = (int) $_GET['ID_per'];
  
      $query = "SELECT `photo_per` FROM `committee` WHERE `ID_per` = $id";
      $poisk = mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($poisk);
      $patch = $_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[photo_per]";
   
      if (file_exists($patch)) {
        if(unlink($patch)){
          echo 'файл удален';
        }
      }
      $file_name = $_FILES['photo']['name'];
      $file_tmp = $_FILES['photo']['tmp_name'];
      $link =htmlspecialchars($link, ENT_QUOTES);
      move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/orgcom/$file_name");
      $dir = "orgcom/$file_name";
      $sql = "UPDATE `committee` SET `photo_per`= '$dir'  WHERE `ID_per` = ".$_GET["ID_per"];
      mysqli_query($connect, $sql);	
      echo "<script> document.location.href='../orgcom.php';</script>"; 
    }	
  }

  if($_GET['update']=='del_per'){
    $id = $_GET['ID_per'];
    $query = "SELECT `photo_per` FROM `committee` WHERE `ID_per` = $id ";
    $poisk = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($poisk);
    $patch = $_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[photo_per]";
    if (file_exists($patch)) {
      if(unlink($patch)){
      }
    }
          $result = mysqli_query($connect, "DELETE FROM `committee` WHERE `ID_per` = $id");
    echo "<script> document.location.href='../orgcom.php';</script>"; 
  }

?>