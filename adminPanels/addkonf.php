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
	<link rel="stylesheet" href="../css/style_button_link.css" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
</head>
<?php
  include('header.php');
  include('nav.php');
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="test.css">
<div class="container"> <div class=" text-center mt-5 ">
    <h1>Добавление конференции</h1>
    </div>
    <div class="row ">
        <div class="col-lg-12 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="add\ADD_conf.php" method="post" enctype="multipart/form-data" id="Add_ALL_Conf" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"> <label for="form_name">Название </label> <input  type="text" name="Name_conf" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"> <label for="form_lastname">Дата</label> <input  type="date" name="date_conf" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
									<div class="col-md-4">
                                        <div class="form-group"> <label for="form_email">Главное фото</label> <input  type="file" name="Centralimage" class="form-control" > </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group"> <label for="form_email">Фото конференции</label> <input  type="file"  name="image[]" multiple class="form-control"  > </div>
                                    </div>
									<div class="col-md-4">
                                        <div class="form-group"> <label for="form_name">Название сборника</label> <input  type="text" name="Name_collection" class="form-control" data-error="Заполните"> </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group"> <label for="form_email">Обложка сборника</label> <input  type="file"  name="cover" multiple class="form-control"  > </div>
                                    </div>
									<div class="col-md-4">
                                        <div class="form-group"> <label for="form_email">Сборник материалов</label> <input  type="file" name="file[]" multiple class="form-control"  > </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group"> <label for="form_message">Содержание конференции</label> <textarea  name="info" class="form-control"  rows="4" ></textarea> </div>
                                    </div>
									<div class="col-md-12">
										<h2 class='text-center'>Видео</h2> 
									</div>	
								</div>
								<div lass="row" id="video">
									<div class="col-md-12" >
                                        <div class="form-group"> <label for="form_email">Ссылка на видео</label> <input  type="text" name="mass[]" class="form-control" > </div>
                                    </div>
								</div>
								<div class="row">
								<div class="col-md-6 mx-auto"><input type="button" id="videoadd" class="btn btn-success btn-send pt-2 btn-block  " value="Добавить поле"></div>	 
								</div>
								<div class="row">
								<div class="col-md-12">
									<h2 class='text-center'>Отзыв</h2> 
								</div></div>
								<div class="row">
									<div class="col-md-6">
                                        <div class="form-group"> <h5>ФИО</h5><input  type="text" name="Name_feedback[]" class="form-control"> </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group"> <h5>Содержание отзыва</h5> <textarea  name="info_feedback[]" class="form-control"  rows="4" ></textarea> </div>
                                    </div>
                                	</div>
								</div>
								<div class="row">
								<div class="col-md-12">
									<h2 class='text-center'>Спикер</h2> 
								</div></div>
								<div class="row">
									<div class="col-md-6">
                                        <div class="form-group"> <h5>ФИО</h5><input  type="text" name="Name_speaker" class="form-control" > </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group"> <h5>Фото спикеры</h5><input  type="file" name="fhspeak" class="form-control"  > </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group"> <h5>Cсылка</h5><input  type="text" name="link_speak" class="form-control" > </div>
                                    </div>
                                </div>
								</div>		
                                <div class="row">
                                    <div class="col-md-12"> <input type="submit" class="mt-3 btn btn-success btn-send pt-2 btn-block " value="Добавить конференцию"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
</div>
</html>
