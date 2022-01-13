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
  <title>Документы</title>
    <link rel="stylesheet" href="../css/style_button_link.css" rel="stylesheet" type="text/css">
</head>
<script src="\js\jquery-3.6.0.min.js"></script> 
<?php
		include('header.php');
		include('nav.php');
	?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="test.css">
<div class="container"> <div class=" text-center mt-5 ">
    <h1>Документы</h1>
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="add\Add_All.php?add=newdock&id=<?= $_GET['id']?>" method="post" id="docum" class = "list" enctype="multipart/form-data">
                            <div class="controls">
							<div class="row">
                            <div class="col-md-12">
                                        <div class="form-group"> <label for="form_name">Название сборника</label> <input  type="text" name="Name_collection" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="form_email">Обложка</label> <input  type="file" name="cover" required="required" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="form_email">Документ</label> <input  type="file" name="file[]" required="required" multiple  class="form-control"></div>
                                    </div>
                                </div>
                                <div class="row">
                            <div class="col-md-12">
                                        <div class="form-group"> <label for="form_name">Ссылка на сборник</label> <input  type="text" name="link_collection" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Добавить документ"> </div>
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
  <h1>Список документов</h1>
  <?php 
    $query = "SELECT * FROM `el_collection` WHERE `ID_conf` = $_GET[id]";
    $poisk = mysqli_query($connect, $query);
    while(($row = mysqli_fetch_assoc($poisk)) != false){
    echo "<div class='row '>
	<div class='col-lg-12 mx-auto'>
		<div class='card mt-2 mx-auto p-4 '>
			<div class='card-body '>
				<div class='container'>
					<form action='update\ALL_EDIT.php?update=delldocs&konf=".$_GET['id']."&&ID_documents=".$row['ID_documents']."' method='post' id='documdell' enctype='multipart/form-data'>
						<div class='controls'>
							<div class='row'>
								<div class='col-md-6'>
									<div class='form-group'> <label for='form_email'>Название документа</label> <h1>".$row['Name_documents']."</h1></div>
								</div>
								<div class='col-md-6'>
									<div class='form-group'> <label for='form_email'>Скачать документ</label> <a href='".$row['Road_to_documents']."' download> <h3>Скачать</h3></a></div>
								</div>
							</div>
							<div class='row'>
								<div class='col-md-12'> <input type='submit' class='btn btn-success btn-send pt-2 btn-block ' value='Удалить'> </div>
							</div>
                        </div>
                    </form>


                    <form action='update\ALL_EDIT.php?update=upcover&konf=".$_GET['id']."&&ID_documents=".$row['ID_documents']."' method='post' enctype='multipart/form-data'>
						<div class='controls'>
						<div class='row'>
							<div class='col-md-8 photo_sp'>
								<div class='form-group'> <h2 class='text-center'>Обложка</h2><img src='".$row["cover"]."' name='photo' > </div>
							</div>
						</div>
						<div class='row'>
							<div class='col-md-12'>
								<div class='form-group'> <label for='form_email'>Загрузить новую обложку</label> <input   type='file' name='New_cover' multiple id='product-photo'class='form-control'></div>
							</div>
							<div class='col-md-12'> <input type='submit' class='btn btn-success btn-send pt-2 btn-block' value='Отправить новое фото'> </div>
						</div>
                        </div>
                    </form>

                    <form action='update\ALL_EDIT.php?update=uplink&konf=".$_GET['id']."&&ID_documents=".$row['ID_documents']."' method='post' id='documdell' enctype='multipart/form-data'>
						<div class='controls'>
                        <div class='row'>
                        <div class='col-md-12'>
                            <div class='form-group'> <label for='form_message'>Ссылка elibrary</label> <textarea  name='link' class='form-control' >".$row['link']."</textarea> </div>
                        </div>
                        <div class='col-md-12'> <input type='submit' class='btn btn-success btn-send pt-2 btn-block ' value='изменить'> </div>
                        </div>
                        </div>
                    </form>
						
				</div>
			</div>
		</div> 
	</div> 
</div>";
    }
  ?>

</main>
</body>
</html>
