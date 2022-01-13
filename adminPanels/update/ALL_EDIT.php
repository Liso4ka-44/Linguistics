<?php
    include('../connect.php');
	
	function translitText($str){
            $tr = array(
                "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
                "Д"=>"D","Е"=>"E","Ё"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
                "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
                "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
                "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
                "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
                "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
                "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j",
                "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
                "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
                "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
                "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
                "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
            );
            return strtr($str,$tr);
        }
	
    if($_GET['update']=='uppannouncement'){
      $ID_announcement = (int) $_GET['ID_announcement'];
      $time=$_POST['timeStart']."-".$_POST['timeEnd'];
      $sql = "UPDATE `announcement` SET `announcement_Date`='".$_POST['date']."',`announcement_Time`='".$time."',`announcement_Name_speaker`='".$_POST['announcement_Name_speaker']."',`announcement_info_speaker`='".$_POST['announcement_info_speaker']."',`announcement_name_konf`='".$_POST['announcement_name_konf']."',`announcement_info_konf`='".$_POST['announcement_info_konf']."' WHERE `ID_announcement`=".$ID_announcement;
      mysqli_query($connect, $sql);	
      echo "<script> document.location.href='../anonslist.php';</script>"; 
    }

    if($_GET['update']=='upplaybill'){
      $id = $_GET['ID_playbill'];
      $query = "SELECT `road` FROM `playbill` WHERE `ID_playbill` = $id ";
      $poisk = mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($poisk);
      $patch ="../..".$row["road"];
     
      if (file_exists($patch)) {
        if(unlink($_SERVER['DOCUMENT_ROOT'].$row["road"])){
        }
      }
      $result = mysqli_query($connect, "DELETE FROM `playbill` WHERE `ID_playbill` = $id");
      echo "<script> document.location.href='../anonslist.php';</script>"; 
    }  

    if($_GET['update']=='newmainphotoconf'){
      $ID_conf = (int)$_GET['ID_conf'];
      $sql = "SELECT `date`, `main_photo` FROM `conferences` WHERE `ID_conf` = ".$ID_conf;
      $poisk=mysqli_query($connect, $sql);	
      $row = mysqli_fetch_assoc($poisk);
      if(!empty($_FILES['newmainphoto']['name']) && $_FILES['newmainphoto']['name']!=""){
        if($row["main_photo"]!=''){
          $patch ="../".$row["main_photo"];
          if (file_exists($patch)) {
            if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[main_photo]")){
              echo 'файл удален';
            }
          }
      }
        $date_konf = date("Y.m.d",strtotime( $row["date"]));
        $file_name = $_FILES['newmainphoto']['name'];
		$file_name = translitText($file_name);
        $file_tmp = $_FILES['newmainphoto']['tmp_name'];
        $dir = '/adminPanels/konf/'.$date_konf."/centralphoto/";
        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . $dir.$file_name.'');
        $dir = 'konf/'.$date_konf."/centralphoto/";
        $fotoSpeaker = $dir.$file_name.'';
        $fotoSpeaker = htmlspecialchars($fotoSpeaker, ENT_QUOTES);
        $sql = "UPDATE `conferences` SET `main_photo`='".$fotoSpeaker."' WHERE `ID_conf` =".$ID_conf;
        mysqli_query($connect, $sql);	
        echo "<script>document.location.href='../foto.php?id=$ID_conf';</script>"; 
      }
      echo "<script>document.location.href='../foto.php?id=$ID_conf';</script>"; 
    }
    if($_GET['update']=='dellanons'){
      $ID_announcement = (int)$_GET['ID_announcement'];
      $sql = "SELECT  `announcement_Date`, `announcement_foto_speaker` FROM `announcement` WHERE`ID_announcement` = ".$ID_announcement;
      $poisk=mysqli_query($connect, $sql);	
      $row = mysqli_fetch_assoc($poisk);
      if($row["announcement_foto_speaker"]!=''){
        $patch ="../..".$row["announcement_foto_speaker"];
        if (file_exists($patch)) {
          if(unlink($_SERVER['DOCUMENT_ROOT']."$row[announcement_foto_speaker]")){
            echo 'файл удален';
          }
        }
      }
      $sql = "DELETE FROM `announcement` WHERE `ID_announcement`=".$ID_announcement;
      mysqli_query($connect, $sql);	
      echo "<script> document.location.href='../anonslist.php';</script>"; 
    }
    if($_GET['update']=='newanonsphoto'){
      $ID_announcement = (int)$_GET['ID_announcement'];
      $sql = "SELECT  `announcement_Date`, `announcement_foto_speaker` FROM `announcement` WHERE`ID_announcement` = ".$ID_announcement;
      $poisk=mysqli_query($connect, $sql);	
      $row = mysqli_fetch_assoc($poisk);
      if(!empty($_FILES['newphotoanons']['name']) && $_FILES['newphotoanons']['name']!=""){
        if($row["announcement_foto_speaker"]!=''){
          $patch ="../..".$row["announcement_foto_speaker"];
          if (file_exists($patch)) {
            if(unlink($_SERVER['DOCUMENT_ROOT']."$row[announcement_foto_speaker]")){
              echo 'файл удален';
            }
          }
        }
        $date_announcement = date("d.m.Y",strtotime( $row["announcement_Date"]));
        $file_name = $_FILES['newphotoanons']['name'];
		$file_name = translitText($file_name); 
        $file_tmp = $_FILES['newphotoanons']['tmp_name'];
        $dir = '/adminPanels/anons/'.$date_announcement."/";
        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . $dir.$file_name.'');
        $fotoSpeaker = $dir.$file_name.'';
        $fotoSpeaker = htmlspecialchars($fotoSpeaker, ENT_QUOTES);
        $sql = "UPDATE `announcement` SET `announcement_foto_speaker`='".$fotoSpeaker."' WHERE `ID_announcement` =".$ID_announcement;
        mysqli_query($connect, $sql);	
        echo "<script> document.location.href='../anonslist.php';</script>"; 
      }
      echo "<script> document.location.href='../anonslist.php';</script>"; 
    }

    
    if($_GET['update']=='uppspeakerphoto'){
      $id = (int) $_GET['ID_speak'];
      $sql = "SELECT`ID_conf`, `photo` FROM `speakers` WHERE `ID_speak` = ".$id;
      $poisk=mysqli_query($connect, $sql);	
      $row = mysqli_fetch_assoc($poisk);
      $idconference = $row['ID_conf'];
      if(!empty($_FILES['New_foto_speaker']['name']) && $_FILES['New_foto_speaker']['name']!=""){
        if($row["photo"]!=''){
          $patch ="../".$row["photo"];
          if (file_exists($patch)) {
            if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[photo]")){
              echo 'файл удален';
            }
          }
        }
        $sql2 = "SELECT `date` FROM `conferences` WHERE `ID_conf` = ". $idconference;
        $poisk2=mysqli_query($connect, $sql2);	
        $row2 = mysqli_fetch_assoc($poisk2);
        $date3 = date("Y.m.d",strtotime( $row2["date"]));
        $file_name = $_FILES['New_foto_speaker']['name'];
		    $file_name = translitText($file_name);
        $file_tmp = $_FILES['New_foto_speaker']['tmp_name'];
        $dir = '/adminPanels/konf/'.$date3."/speakers/";
        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . $dir.$file_name.'');
        $dir = 'konf/'.$date3."/speakers/";
        $fotoSpeaker = $dir.$file_name.'';
        $fotoSpeaker = htmlspecialchars($fotoSpeaker, ENT_QUOTES);
        $sql = "UPDATE `speakers` SET`photo`='".$fotoSpeaker."' WHERE `ID_speak` =".$id;
        mysqli_query($connect, $sql);	
        echo "<script> document.location.href='../speakch.php?id=".$idconference."';</script>";
      }
      echo "<script> document.location.href='../speakch.php?id=".$idconference."';</script>";
    }
    if($_GET['update']=='uppspeaker'){
      $id = (int) $_GET['ID_speak'];
      $sql = "SELECT`ID_conf`, `photo` FROM `speakers` WHERE `ID_speak` = ".$id;
      $poisk=mysqli_query($connect, $sql);	
      $row = mysqli_fetch_assoc($poisk);
      $idconference = $row['ID_conf'];
      $name = $_POST["name"];
      $linkSP = $_POST["linkSP"];
      $sql = "UPDATE `speakers` SET `name`='$name',`linkSP`='$linkSP' WHERE `ID_speak`=$id";
      mysqli_query($connect, $sql);	
      echo "<script> document.location.href='../speakch.php?id=".$idconference."';</script>";
    }
    if($_GET['update']=='dellspeaker'){
      $id = (int) $_GET['ID_speak'];
      $query = "SELECT `ID_conf`, `photo` FROM `speakers` WHERE `ID_speak` = $id ";
      $poisk = mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($poisk);
      $idconference = $row['ID_conf'];
      $patch ="../".$row["photo"];
      if (file_exists($patch)) {
        if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[photo]")){
          echo 'файл удален';
        }
      }
      $result = mysqli_query($connect, "DELETE FROM `speakers` WHERE `ID_speak` = $id");
      echo "<script> document.location.href='../speakch.php?id=".$idconference."';</script>";
    }
    if($_GET['update']=='dellplaybill'){
      $id = (int) $_GET['id'];
      $query = "SELECT `playbill` FROM `conferences` WHERE `ID_conf` = $id ";
      $poisk = mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($poisk);
      if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[playbill]")){
        echo 'файл удален';
      }
      $result = mysqli_query($connect, "UPDATE `conferences` SET `playbill`='' WHERE `ID_conf` = $id");
      echo "<script> document.location.href='../text.php?id=".$id."';</script>";     
    }
    if($_GET['update']=='inf'){
      $info = $_POST["info"];
      $date= $_POST["Date"];
      $sql = "SELECT  `date` FROM `conferences` WHERE `ID_conf`=".$_GET["id"];
      $poisk = mysqli_query($connect, $sql);
      $row = mysqli_fetch_assoc($poisk);
      if($date!=$row ['date']){
        $nameafter = date("Y.m.d",strtotime($date));
        $path = __DIR__ . "./../konf/$nameafter";
        if (!is_dir($path)) {
          mkdir($path, 0777, true);
        }
        $path = __DIR__ . "./../konf/$nameafter/centralphoto";
        if (!is_dir($path)) {
          mkdir($path, 0777, true);
        }
        $path = __DIR__ . "./../konf/$nameafter/materials";
        if (!is_dir($path)) {
          mkdir($path, 0777, true);
        }
        $path = __DIR__ . "./../konf/$nameafter/speakers";
        if (!is_dir($path)) {
          mkdir($path, 0777, true);
        }
        $path = __DIR__ . "./../konf/$nameafter/foto";
        if (!is_dir($path)) {
          mkdir($path, 0777, true);
        }
        $path = __DIR__ . "./../konf/$nameafter/playbill";
        if (!is_dir($path)) {
          mkdir($path, 0777, true);
        }
      }
      $namecon= $_POST["Name_conf"];
      $sql = "UPDATE `conferences` SET `Name_conf`= '$namecon', `date`='$date',`info`= '$info' WHERE `ID_conf`=".$_GET["id"];
      mysqli_query($connect, $sql);
      echo "<script> document.location.href='../text.php?id=".$_GET['id']."';</script>"; 
    }
    if($_GET['update']=='dellphotokonf'){
      $id = (int)$_GET['ID_photo'];
      $query = "SELECT `photo_conf` FROM `photo_conf` WHERE `ID_photo` = $id ";
      $poisk = mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($poisk);
      $patch ="../".$row["photo_conf"];

      if (file_exists($patch)) {
        if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[photo_conf]")){
          echo 'файл удален';
        }
      }
      mysqli_query($connect, "DELETE FROM `photo_conf` WHERE`ID_photo` = $id");
      $konf=$_GET['konf'];
      echo "<script> document.location.href='../foto.php?id=".$konf."';</script>";
    }
    if($_GET['update']=='dellfeedcconf'){
      $konf= $_GET['konf'];
      $id =(int) $_GET['ID_feedback'];
      $result = mysqli_query($connect, "DELETE FROM `feedback` WHERE `ID_feedback` = '$id'");
      echo "<script> document.location.href='../feedback.php?id=$konf';</script>"; 
    }
    if($_GET['update']=='dellvideoconf'){
      $idvideo =(int) $_GET['idvideo'];
      $konf= $_GET['konf'];
      $result = mysqli_query($connect, "DELETE FROM `video_conf` WHERE `ID_video_conf` = $idvideo");
      echo "<script>document.location.href='../video.php?id=$konf';</script>"; 
    }
    if($_GET['update']=='delldocs'){
      $id = $_GET['ID_documents'];
      $konf= $_GET['konf'];
      $query = "SELECT `Road_to_documents` FROM `el_collection` WHERE `ID_documents` = $id ";
      $poisk = mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($poisk);
      $patch ="../..".$row["Road_to_documents"];
     
      if (file_exists($patch)) {
        if(unlink($_SERVER['DOCUMENT_ROOT'].$row["Road_to_documents"])){
        }
      }
      $result = mysqli_query($connect, "DELETE FROM `el_collection` WHERE `ID_documents` = $id");
      echo "<script>document.location.href='../documents.php?id=$konf';</script>"; 
    }
    
    if($_GET['update']=='upcover'){
      $id = (int) $_GET['ID_documents'];
      $sql = "SELECT `ID_conf`, `cover` FROM `el_collection` WHERE `ID_documents` = ".$id;
      $poisk=mysqli_query($connect, $sql);	
      $row = mysqli_fetch_assoc($poisk);
      $idconference = $row['ID_conf'];
      if(!empty($_FILES['New_cover']['name']) && $_FILES['New_cover']['name']!=""){
        if($row["cover"]!=''){
          $patch ="../".$row["cover"];
          if (file_exists($patch)) {
            if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[cover]")){
              echo 'файл удален';
            }
          }
        }
        $sql2 = "SELECT `date` FROM `conferences` WHERE `ID_conf` = ". $idconference;
        $poisk2=mysqli_query($connect, $sql2);	
        $row2 = mysqli_fetch_assoc($poisk2);
        $date3 = date("Y.m.d",strtotime( $row2["date"]));
        $file_name = $_FILES['New_cover']['name'];
		    $file_name = translitText($file_name);
        $file_tmp = $_FILES['New_cover']['tmp_name'];
        $dir = '/adminPanels/konf/'.$date3."/cover/";
        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . $dir.$file_name.'');
        $dir = "konf/".$date3."/cover/";
        $cover = $dir.$file_name.'';
        $cover = htmlspecialchars($cover, ENT_QUOTES);
        $sql = "UPDATE `el_collection` SET `cover`='".$cover."' WHERE `ID_documents` =".$id;
        mysqli_query($connect, $sql);	
        echo "<script>document.location.href='../documents.php?id=".$idconference."';</script>"; 
      }
      echo "<script> document.location.href='../documents.php?id=".$idconference."';</script>";
    }

    if($_GET['update']=='uplink'){
      $id = (int) $_GET['ID_documents'];
      $sql = "SELECT `ID_conf` FROM `el_collection` WHERE `ID_documents` = ".$id;
      $poisk=mysqli_query($connect, $sql);	
      $row = mysqli_fetch_assoc($poisk);
      $idconference = $row['ID_conf'];
      $link = $_POST["link"];
      $sql = "UPDATE `el_collection` SET `link`='$link' WHERE `ID_documents`=$id";
      mysqli_query($connect, $sql);	
      echo "<script> document.location.href='../documents.php?id=".$idconference."';</script>";
    }

    if($_GET['update']=='dellorgcom'){
      $idm=$_GET['id_per'];
      $query = "SELECT `photo_per` FROM `сommittee` WHERE `ID_per` = $idm ";
      $poisk = mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($poisk);
      $patch ="../".$row["photo_per"];
      if (file_exists($patch)) {
        if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[photo_per]")){
        }
      }
			$result = mysqli_query($connect, "DELETE FROM `сommittee` WHERE `ID_per` = $idm");
      echo "<script> document.location.href='../orgcomlist.php';</script>"; 
    }
    if($_GET['update']=='uppphotoorgcom'){
      if(!empty($_FILES['Foto_orgcom']['name'])){
        $idm = (int) $_GET['ID_per'];
    
        $query = "SELECT `photo_per` FROM `сommittee` WHERE `ID_per` = $idm ";
        $poisk = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($poisk);
        $patch ="../".$row["photo_per"];
     
        if (file_exists($patch)) {
          if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[photo_per]")){
            echo 'файл удален';
          }
        }
        $file_name = $_FILES['Foto_orgcom']['name'];
		$file_name = translitText($file_name);
        $file_tmp = $_FILES['Foto_orgcom']['tmp_name'];
        $link =htmlspecialchars($link, ENT_QUOTES);
        move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/adminPanels/orgcom/$file_name");
        $dir = "orgcom/$file_name";
        $sql = "UPDATE `сommittee` SET `photo_per`= '$dir'  WHERE `ID_per` = ".$_GET["ID_per"];
        mysqli_query($connect, $sql);	
        echo "<script> document.location.href='../orgcomlist.php';</script>"; 
      }	
    }
    if($_GET['update']=='upporgcom'){
      $sql = "UPDATE `сommittee` SET `name_per`= '".$_POST["name"]."', `link_per`= '".$_POST["linkP"]."', `position`= '".$_POST["Post"]."' WHERE `ID_per` = ".$_GET["ID_per"];
      mysqli_query($connect, $sql);
      echo "<script> document.location.href='../orgcomlist.php';</script>"; 
    }
    if($_GET['update']=='uppfeedcconf'){
      $konf= $_GET['konf'];
      $sql = "UPDATE `feedback` SET `Name_feedback`= '".$_POST['name']."', `feedback`= '".$_POST['feedback']."' WHERE `ID_feedback` = ".$_GET["ID_feedback"];
      mysqli_query($connect, $sql);
      echo "<script> document.location.href='../feedback.php?id=$konf';</script>"; 
    }
    if($_GET['update']=='dellPhotoconf'){
      $idphoto = (int) $_GET['idphoto'];
      $query = "SELECT  `photo_conf` FROM `photo_conf` WHERE `ID_ photo` = $idphoto ";
      $poisk = mysqli_query($connect, $query);
      $row = mysqli_fetch_assoc($poisk);
      $patch ="../".$row["photo_conf"];
      if (file_exists($patch)){
        if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[photo_conf]")){
          echo 'файл удален';
        }
      }
      $result = mysqli_query($connect, "DELETE FROM `photo_conf` WHERE`ID_ photo` = $idphoto");
    }
    if($_GET['update']=='programm'){
      $id = (int) $_GET['id'];
      if(!empty($_FILES["program"]["name"])){
        $query = "SELECT `playbill`,`date` FROM `conferences` WHERE  `ID_conf` = ".$_GET['id']."";
        $poisk = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($poisk);
        $dateKonf = date("Y.m.d",strtotime($row["date"]));    
        $input_name = 'program';
        $allow = array();
        $deny = array(
                'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
                'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
                'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
        );
        $path = __DIR__ . "$dir";

        if($row["playbill"]!=''){
          $patch ="../".$row["playbill"];
          if (file_exists($patch)) {
            if(unlink($_SERVER['DOCUMENT_ROOT']."/adminPanels/$row[playbill]")){
              echo 'файл удален';
            }
          }
        }  
        if (isset($_FILES[$input_name])) {
            if (!isset($_FILES[$input_name])) {
                $error = 'Файлы не загружены.';
            } else {
                $files = array();
                $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
                if ($diff == 0) {
                    $files = array($_FILES[$input_name]);
                } else {
                    foreach($_FILES[$input_name] as $k => $l) {
                        foreach($l as $i => $v) {
                            $files[$i][$k] = $v;
                        }
                    }		
                }	
                foreach ($files as $file) {
                    $error = $success = '';
                    // Проверим на ошибки загрузки.
                    if (!empty($file['error']) || empty($file['tmp_name'])) {
                        $error = 'Не удалось загрузить файл.';
                    } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
                        $error = 'Не удалось загрузить файл.';
                    } else {
                        // Оставляем в имени файла только буквы, цифры и некоторые символы.
                        $pattern = "[^A-Za-zА-Яа-яё0-9,~!@#% ^-_\$\?\(\)\{\}\[\]\.]";
                        $name = mb_eregi_replace($pattern, '-', $file['name']);
                        $name = mb_ereg_replace('[-]+', '-', $name);
                        $parts = pathinfo($name);
                       if (empty($name) || empty($parts['extension'])) {
                            $error = 'Недопустимый тип файла';
                        } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                            $error = 'Недопустимый тип файла';
                        } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                            $error = 'Недопустимый тип файла';
                        } else {
                            if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] ."/adminPanels/konf/$dateKonf/playbill/" . $name)) {
                                $dir = htmlspecialchars("konf/$dateKonf/playbill/$name", ENT_QUOTES);
                                $sql = "UPDATE `conferences` SET `playbill`='".$dir."' WHERE `ID_conf`= $id";
                                mysqli_query($connect, $sql);
                                echo "<script> document.location.href='../text.php?id=".$id."';</script>"; 
                            } 
                        }
                    }
                }
            }
        }
      }
      echo "<script> document.location.href='../text.php?id=".$id."';</script>";     
    }
?>