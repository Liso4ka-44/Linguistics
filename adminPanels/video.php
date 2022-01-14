<?php
	session_start();
    if($_SESSION['aut']!='true'){
       echo"<script>document.location.href='index.php';</script>";
       exit();
     }
   	include('connect.php');
   	$query = "SELECT * FROM `video_conf` WHERE  `ID_conf` = ".$_GET['id']."";
   	$poisk = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Видео</title>
    <link rel="stylesheet" href="../css/style_button_link.css" rel="stylesheet" type="text/css">
</head>
<?php
  include('header.php');
  include('nav.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="test.css">
<div class="container"> <div class=" text-center mt-5 ">
    <h1>Видео конференции</h1>
    </div>
    <div class="row text-center ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="add\Add_All.php?add=video&idconf=<?= $_GET['id']?>" method="post" enctype="multipart/form-data" id="orgcom" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_email">Ссылка на видео</label> <input  type="text" name="url_video" class="form-control" required="required" data-error="Заполните"> </div>
                                    </div>
                                </div>
                                <div class="row">
								<div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Добавить"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
</div>
<body>
<?php
      while(($row = mysqli_fetch_assoc($poisk)) != false){
        echo "<div class='row text-center '>
        <div class='col-lg-7 mx-auto'>
            <div class='card mt-2 mx-auto p-4 '>
                <div class='card-body '>
                    <div class='container'>
					<form action='update\ALL_EDIT.php?update=dellvideoconf&konf=".$_GET['id']."&idvideo=".$row['ID_video_conf']."' method='post' enctype='multipart/form-data' >
                            <div class='controls'>
                                <div class='row'>
                                    <div class='col-md-8' video>
									<iframe width='500' height='350' src='https://www.youtube.com/embed/".$row['video_conf']."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12'>  <input type='submit' name='del' class='btn btn-success btn-send pt-2 btn-block' value='Удалить'></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </div> ";
      }
    ?>
</body>
</html>
