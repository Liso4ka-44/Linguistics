<?php
    session_start();
	if($_SESSION['aut']!='true'){
	   echo"<script>document.location.href='index.php';</script>";
	   exit();
	 }
    ob_start();
    include('connect.php');
    $query = "SELECT * FROM `сommittee`";
    $poisk = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
    <link href = "../css/style_button_link.css" rel = "stylesheet" type = "text/css">
  <title>Оргкомитет</title>
</head>
<?php
		include('header.php');
		include('nav.php');
	?>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="test.css">
<div class="container"> <div class=" text-center mt-5 ">
    <h1>Оргкомитет</h1>
    </div>
    <div class="row text-center ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="add\addorgcom.php" method="post" enctype="multipart/form-data" id="orgcom" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">ФИО </label> <input  type="text" name="name_orgcom" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Ссылка</label> <input  type="text" name="url_orgcom" class="form-control" required="required" data-error="Заполните"> </div>
                                    </div>
									<div class="col-md-12">
                                        <div class="form-group"> <label for="form_email">Должность</label> <input  type="text" name="post_orgcom" class="form-control" required="required" data-error="Заполните"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_email">Фото</label> <input  type="file" name="Foto_orgcom" class="form-control"  required="required" data-error="Заполните"> </div>
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
<?php
	while(($row = mysqli_fetch_assoc($poisk)) != false){
	echo " <div class='row text-center '>
	<div class='col-lg-12 mx-auto'>
		<div class='card mt-2 mx-auto p-4 '>
			<div class='card-body '>
				<div class='container'>
					<form action='update/ALL_EDIT.php?update=upporgcom&ID_per=".$row['ID_per']."' method='post' enctype='multipart/form-data' >
						<div class='controls'>
							<div class='row'>
								<div class='col-md-6'>
									<div class='form-group'> <label for='form_name'>ФИО </label> <input  type='text' name='name' class='form-control' value='".$row['name_per']."'> </div>
								</div>
								<div class='col-md-6'>
									<div class='form-group'> <label for='form_email'>Ссылка</label> <input  type='text' name='linkP' class='form-control' value='".$row['link_per']."'> </div>
								</div>
								<div class='col-md-6'>
									<div class='form-group'> <label for='form_email'>Ссылка</label> <input  type='text' name='Post' class='form-control' value='".$row['position']."'> </div>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-12'> <input type='submit' class='btn btn-success btn-send pt-2 btn-block' value='Изменить текст'> </div>
							</div>
						</div>
					</form>
					<form action='update/ALL_EDIT.php?update=uppphotoorgcom&ID_per=".$row['ID_per']."' method='post' enctype='multipart/form-data' >
					<div class='controls'>
						<div class='row'>
							<div class='col-md-8 photo_sp'>
								<div class='form-group'> <h2 class='text-center'>Фотография </h2><img src='".$row["photo_per"]."' name='photo'> </div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
								<div class='form-group'> <label for='form_email'>Загрузить новую главную фотографию</label> <input   type='file' name='Foto_orgcom' multiple id='product-photo'class='form-control'></div>
							</div>
							<div class='col-md-12'> <input type='submit' class='btn btn-success btn-send pt-2 btn-block' value='Отправить новое фото'> </div>
						</div>
						</div>
					</form>
					<form action='update/ALL_EDIT.php?update=dellorgcom&id_per=".$row['ID_per']."' method='post' enctype='multipart/form-data' >
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
