<?php
session_start();
if($_SESSION['aut']!='true'){
   echo"<script>document.location.href='index.php';</script>";
   exit();
 }
?>
<!DOCTYPE html>
<html lang="ru">
<?php
	include('header.php');
	include('nav.php');
	include('connect.php');
	$result = mysqli_query ($connect, "SELECT  `main_photo` FROM `conferences` WHERE `ID_conf` = ".$_GET["id"]);
	$row2=mysqli_fetch_assoc($result);
?>
<head>
	<meta charset="utf-8">
    <link href = "../css/style_button_link.css" rel = "stylesheet" type = "text/css">
	<title>Редактирование фотографий</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="test.css">
<div class="container"> <div class=" text-center mt-5 ">
    <h1>Фотографии</h1>
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="add\Add_All.php?add=addfoto&id=<?= $_GET['id']?>"  method="post" id="deliteform" enctype="multipart/form-data" >
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_email">Фотографии</label> <input   type='file' name='image[]' multiple id='product-photo'class="form-control"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"><input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Добавить"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
</div>
<main class="page-products">
  <div class="page-products__header">
    <span class="page-products__header-field">Главная фотография</span>
    <?php
        	if($row2["main_photo"]!=''){
                $phototospeaker="<div class='col-md-8 photo_sp'> 
					<img src='".$row2["main_photo"]."' name='main' >
				</div>";
            }
            else{
                $phototospeaker="<h1 class='text-center'>Главного фото   нету</h1>";
            }
    ?>
  </div>
  <div class="container">
    <div class="row ">
        <div class="col-lg-12 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="update/ALL_EDIT.php?update=newmainphotoconf&ID_conf=<?=$_GET['id']?>"  method='post' id='announcement' enctype='multipart/form-data'>
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <?=$phototospeaker?> </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group"> <label for="form_email">Загрузить новую главную фотографию</label> <input   type='file' name='newmainphoto' multiple id='product-photo'class="form-control"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Отправить"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
</div>
 <h1>Фотографии конференции</h1>
 <?php
	$query = "SELECT * FROM `photo_conf` WHERE `ID_conf` = $_GET[id]";
    $poisk = mysqli_query($connect, $query);
	while(($row = mysqli_fetch_assoc($poisk)) != false){
	echo "<div class='container'>
			<div class='row '>
				<div class='col-lg-12 mx-auto'>
					<div class='card mt-2 mx-auto p-4 '>
						<div class='card-body '>
							<div class='container'>
								<form action='update\ALL_EDIT.php?update=dellphotokonf&konf=".$_GET['id']."&ID_photo=".$row['ID_photo']."' method='post' enctype='multipart/form-data' >
									<div class='controls'>
										<div class='row'>
											<div class='col-md-8 photo_sp'>
												<div class='form-group'> <img src='".$row["photo_conf"]."' > </div>
											</div>
										</div>
										<div class='row'>
											<div class='col-md-12'> <input type='submit' class='btn btn-success btn-send pt-2 btn-block ' value='Удалить'> </div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div> 
				</div> 
			</div>
		</div>" ;
			}
	?>
	</main>
</body>
</html>
