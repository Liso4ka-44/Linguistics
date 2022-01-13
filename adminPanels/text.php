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
	<title>Редактирование конференции</title>
</head>
<?php
		include('header.php');
		include('nav.php');
		$result = mysqli_query ($connect, "SELECT * FROM `conferences` WHERE `ID_conf` = ".$_GET["id"]);
		$row=mysqli_fetch_assoc($result);
		if($row['playbill']!=''){
			$playbill= "<a href = '".$row['playbill']."' download><h3>Скачать</h3></a> ";
		}
		else{
			$playbill= "<h1>Программы нету</h1> ";
		}
		$plakonfexplode=explode(PHP_EOL,$row["info"]);
		foreach($plakonfexplode as $key => $value){
			if($value!=''){
				$info.=$value;
			}
			else{
				$info.=PHP_EOL;
			}
		}
	?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="test.css">
<h1 class='text-center'>Редактирование основной информации 
</h1>
<div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="update/ALL_EDIT.php?update=inf&id=<?=$_GET['id']?>" method="post" id="announcement" enctype="multipart/form-data" >
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Название </label> <input  type="text" name="Name_conf" class="form-control" value = '<?=$row['Name_conf']?>' > </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Дата</label> <input  type="date" name="Date" value = '<?=$row["date"]?>' class="form-control"  > </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_message">Информация</label> <textarea  name="info" class="form-control"  rows="4" ><?=$row["info"]?></textarea> </div>
                                    </div>
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="изменить"> </div>
                                </div>
                            </div>
                        </form>
						<!--<form action="update/ALL_EDIT.php?update=programm&id=<?=$_GET['id']?>" id='prog' method='post' enctype='multipart/form-data'>
							<div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <h5>Скачать текущюю программку</h5><?=$playbill?></div>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-md-6">
                                        <div class="form-group"> <label for="form_message">Новая программка</label><input type='file' name='program' class="form-control"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_message">Загрузить новую программку</label> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Отправить"> </div>
                                    </div>
                                </div>
                            </div>
						</form>
						<form action="update/ALL_EDIT.php?update=dellplaybill&id=<?=$_GET['id']?>" id='prog' method='post' enctype='multipart/form-data'>
							<div class="controls">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">  <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Удалить программку"> </div>
                                    </div>
                                </div>
                            </div>
						</form>-->
                    </div>
                </div>
            </div> 
        </div> 
    </div>
</html>
