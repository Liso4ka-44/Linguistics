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
  <title>Редактирование отзывов</title>
     <link rel="stylesheet" href="../css/style_button_link.css" rel="stylesheet" type="text/css">
</head>
<?php
		include('header.php');
		include('nav.php');
	?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="test.css">
<div class="container"> <div class=" text-center mt-5 ">
    <h1>Отзывы</h1>
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="add\Add_All.php?add=FEEDBACKCONF&idconf=<?= $_GET['id']?>" method="post" id="feedback" enctype="multipart/form-data" >
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">ФИО </label> <input  type="text" name="Name_feedback" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_message">Содержание</label> <textarea  name="info_feedback" class="form-control"  rows="4" required="required" data-error="Заполните"></textarea> </div>
                                    </div>
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Добавить отзыв"> </div>
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
<main class="page-products">
<h1>Список отзывов</h1>

<?php 
    $query = "SELECT * FROM `feedback` WHERE `ID_conf` = $_GET[id]";
    $poisk = mysqli_query($connect, $query);
    while(($row = mysqli_fetch_assoc($poisk)) != false){
     echo ' <div class="row ">
	 			<div class="col-lg-12 mx-auto">
		 			<div class="card mt-2 mx-auto p-4 ">
						<div class="card-body ">
				 			<div class="container">
					 			<form action="update\ALL_EDIT.php?update=uppfeedcconf&konf='.$_GET["id"].'&ID_feedback='.$row["ID_feedback"].'" method="post" id="feedback" enctype="multipart/form-data" >
						 			<div class="controls">
							 			<div class="row">
								 			<div class="col-md-6">
									 			<div class="form-group"> <label for="form_name">ФИО </label> <input  type="text" name="name" class="form-control" value="'.$row["Name_feedback"].'"> </div>
											 </div>  
							 			</div>
							 			<div class="row">
								 			<div class="col-md-12">
									 			<div class="form-group"> <label for="form_message">Содержание</label> <textarea  name="feedback" class="form-control"  rows="4" >'.$row["feedback"].'</textarea> </div>
								 			</div>
								 				<div class="col-md-12"><input type="submit" class="editdeedback btn btn-success btn-send pt-2 btn-block " value="Обновить"></div>
							 			</div>
						 			</div>
								</form>
					 			<form action="update\ALL_EDIT.php?update=dellfeedcconf&konf='.$_GET["id"].'&ID_feedback='.$row["ID_feedback"].'" method="post" id="feedback" enctype="multipart/form-data" >
					 				<div class="controls">
						 				<div class="row">
							 				<div class="col-md-12"><input type="submit" class="mt-2 btn btn-success btn-send pt-2 btn-block del" value="Удалить"></div>
						 				</div>
									</div>
					 			</form>
							</div>
			 			</div>
		 			</div> 
	 			</div> 
 			</div>';}
    ?>
</main>
</body>
</html>
