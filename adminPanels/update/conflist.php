<?php
    session_start();
    if($_SESSION['aut']!='true'){
      echo"<script>document.location.href='index.php';</script>";
      exit();
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Список конференций</title>
  <?php    
    include('header.php');
    include('nav.php');
  ?>
	<link rel="stylesheet" href="../css/styleaddmins.css">
	<link rel="stylesheet" href="../css/style_button_link.css">
	<script src="js/scripts.js" defer=""></script>
</head>

<body>
	<main class="page-order">
		<h1 class="h h--1">Список конференций</h1>
		<ul class="page-order__list">
			<?php
        include('connect.php');
        $poisk = mysqli_query($connect,"SELECT * FROM `conferences`");
        while(($row = mysqli_fetch_assoc($poisk)) != false){
        $id = (int) $row['ID_conf'];
        $img="";
        if($row['main_photo']!=''){
          $img="<img src='".$row['main_photo']."' width='100px' height='100px'>";
        }
        $feedback='';
        $docum='';
        $video='';
        $speaker='';
        //сбор фото по конфиренции
        $poiskfoto = mysqli_query($connect," SELECT  `photo_conf` FROM `photo_conf` WHERE `ID_conf` = $id ");
        while(($row2 = mysqli_fetch_assoc($poiskfoto)) != false){
            $img.="<img src='".$row2['photo_conf']."' width='100px' height='100px'>";
        }
        //сбор отзывов по конфиренции
        $poiskfeedback = mysqli_query($connect," SELECT `Name_feedback`, `feedback`  FROM `feedback` WHERE `ID_conf` = $id ");
        while(($row3 = mysqli_fetch_assoc($poiskfeedback)) != false){
            $feedback.="<p> ФИО : ".$row3['Name_feedback']."</p><p>Содержание : ".$row3['feedback']."</p>";
        }
        //сбор документов по конфиренции
        $poiskdocum = mysqli_query($connect," SELECT  `Name_documents`, `Road_to_documents` FROM `el_collection` WHERE `ID_conf` = $id ");
        while(($row3 = mysqli_fetch_assoc($poiskdocum)) != false){
            $docum.="<p> Название : ".$row3['Name_documents']." <a href = '".$row3['Road_to_documents']."'>Скачать<a></p>";
        }
        //сбор видео по конфиренции
        $poiskvideo = mysqli_query($connect," SELECT  `video_conf` FROM `video_conf` WHERE  `ID_conf` = $id ");
        while(($row3 = mysqli_fetch_assoc($poiskvideo)) != false){
            $video.="<iframe width='360' height='215' src='https://www.youtube.com/embed/".$row3['video_conf']."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
        }
        //сбор спикеров по конфиренции
        $poiskspeaker = mysqli_query($connect," SELECT  `ID_conf`, `name`, `photo`, `linkSP` FROM `speakers` WHERE `ID_conf` = $id ");
        while(($row3 = mysqli_fetch_assoc($poiskspeaker)) != false){
           if($row3['photo']!=''){
          $img2="<img src='".$row3['photo']."' width='100px' height='100px'>";
        }
          else{$img2='';}
            $speaker.="<p>Фото </p>$img2<p> ФИО : ".$row3['name']."</p><p>Ссылка : ".$row3['linkSP']."</p>";
        }

        echo '<li class="order-item page-order__item">
                <div class="order-item__wrapper">
                  <div class="order-item__group order-item__group--id">
                      <span class="order-item__title">Id конференции</span>
                      <span class="order-item__info order-item__info--id">'.$row["ID_conf"].'</span>
                  </div>
                  <div class="order-item__group">
                      <span class="order-item__title">Дата конференции</span>
                      '.date("d.m.Y",strtotime($row["date"])).'
                  </div>
                  <button class="order-item__toggle"></button>
                </div>
                <div class="order-item__wrapper">
                  <div class="order-item__group">
                    <span class="order-item__title">Название</span>
                    <span class="order-item__info">'.$row["Name_conf"].'</span>
                  </div>                      
                  <div class="order-item__group">
                    <a href = "text.php?id='.$row["ID_conf"].'" class = "link_red_konf"><button class="order-item__info buton">Редактировать конференцию</button></a>
                  </div>
                </div>
                <div class="order-item__wrapper">
                  <div class="order-item__group">
                    <span class="order-item__title">Информация о конференции</span>
                    <span class="order-item__info">'.$row["info"].'</span>
                  </div>
                </div>
                <div class="order-item__wrapper">
                  <div class="order-item__group">
                    <span class="order-item__title">Фото</span>
                    <span class="order-item__info">'.$img.'</span>
                  </div>
						      <div class="order-item__group">
                    <a href = "foto.php?id='.$row["ID_conf"].'" class = "link_red_konf"><button class="order-item__info buton">Редактировать фото</button></a>
                  </div>
                </div>
                <div class="order-item__wrapper">
                  <div class="order-item__group">
                    <span class="order-item__title">Спикеры</span>
                    <span class="order-item__info">'.$speaker.'</span>
                  </div>
						      <div class="order-item__group">
                    <a href = "speakch.php?id='.$row["ID_conf"].'" class = "link_red_konf"><button class="order-item__info buton">Редактировать спикеров</button></a>
                  </div>
                </div>
                <div class="order-item__wrapper">
                  <div class="order-item__group">
                    <span class="order-item__title">Документы</span>
                    <span class="order-item__info">'.$docum.'</span>
                  </div>
					        <div class="order-item__group">
                    <a href = "documents.php?id='.$row["ID_conf"].'" class = "link_red_konf"><button class="order-item__info buton">Редактировать сборники материалов</button></a>
                  </div>
                </div>
                <div class="order-item__wrapper">
                  <div class="order-item__group">
                    <span class="order-item__title">Список видео</span>
                    <span class="order-item__info">'.$video.'</span>
                  </div>
					        <div class="order-item__group">
                    <a href = "video.php?id='.$row["ID_conf"].'" class = "link_red_konf"><button class="order-item__info buton">Редактировать видео</button></a>
                  </div>
                </div>     
					      <div class="order-item__wrapper">
                  <div class="order-item__group">
                      <span class="order-item__title">Отзыв</span>
                      <span class="order-item__info">'. $feedback.'</span>
                  </div>
						      <div class="order-item__group">
                    <a href = "feedback.php?id='.$row["ID_conf"].'" class = "link_red_konf"><button class="order-item__info buton">Редактировать отзывы</button></a>
                  </div>
                </div>
                <div class="deldiv">
              
                <button class="deletebut" name="delete"><a href = "konf/delete.php?id='.$row["ID_conf"].'" >удалить конференцию</a></button>
                </div>
              </li>';
      }
      ?>
		</ul>
	</main>
</body>
</html>
