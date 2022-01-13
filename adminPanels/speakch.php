<?php
    session_start();
	if($_SESSION['aut']!='true'){
	   echo"<script>document.location.href='index.php';</script>";
	   exit();
	 }
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style_button_link.css" rel="stylesheet" type="text/css">
    <title>Редактирование спикеров</title>
</head>
<?php
	include('header.php');
	include('nav.php');
	?>
<body>
<div class="container"> <div class=" text-center mt-5 ">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="test.css">
    <h1>Спикеры</h1>
    </div>
    <div class="row text-center ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="add\speak.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data"  id="docum" >
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">ФИО </label> <input  type="text" name="Name_speaker" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Ссылка</label> <input  type="text" name="link_speak" class="form-control" required="required" data-error="Заполните"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_email">Фото</label> <input  type="file" name="fhspeak" class="form-control"  required="required" data-error="Заполните"> </div>
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
<main class="page-products">
<?php	$query = "SELECT * FROM `speakers` WHERE `ID_conf` = $_GET[id]";
	$poisk = mysqli_query($connect, $query);
	while(($row = mysqli_fetch_assoc($poisk)) != false){
	echo " <div class='row text-center '>
	<div class='col-lg-12 mx-auto'>
		<div class='card mt-2 mx-auto p-4 '>
			<div class='card-body '>
				<div class='container'>
					<form action='update/ALL_EDIT.php?update=uppspeaker&ID_speak=".$row['ID_speak']."' method='post' enctype='multipart/form-data' >
						<div class='controls'>
							<div class='row'>
								<div class='col-md-6'>
									<div class='form-group'> <label for='form_name'>ФИО </label> <input  type='text' name='name' class='form-control' value='".$row['name']."'> </div>
								</div>
								<div class='col-md-6'>
									<div class='form-group'> <label for='form_email'>Ссылка</label> <input  type='text' name='linkSP' class='form-control' value='".$row['linkSP']."'> </div>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-12'> <input type='submit' class='btn btn-success btn-send pt-2 btn-block' value='Изменить текст'> </div>
							</div>
						</div>
					</form>
					<form action='update/ALL_EDIT.php?update=uppspeakerphoto&ID_speak=".$row['ID_speak']."' method='post' enctype='multipart/form-data' >
					<div class='controls'>
						<div class='row'>
							<div class='col-md-8 photo_sp'>
								<div class='form-group'> <h2 class='text-center'>Фотография </h2><img src='".$row["photo"]."' name='photo' > </div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
								<div class='form-group'> <label for='form_email'>Загрузить новую главную фотографию</label> <input   type='file' name='New_foto_speaker' multiple id='product-photo'class='form-control'></div>
							</div>
							<div class='col-md-12'> <input type='submit' class='btn btn-success btn-send pt-2 btn-block' value='Отправить новое фото'> </div>
						</div>
						</div>
					</form>
					<form action='update/ALL_EDIT.php?update=dellspeaker&ID_speak=".$row['ID_speak']."' method='post' enctype='multipart/form-data' >
					<div class='controls'>
						<div class='row'>
							<div class='col-md-12'> <input type='submit' class=' mt-2  btn btn-success btn-send pt-2 btn-block' value='Удалить'> </div>
						</div>
						</div>
					</form>
				</div>
			</div>
		</div> 
	</div> 
</div>";}
	?>
</main>
</body>
</html>
