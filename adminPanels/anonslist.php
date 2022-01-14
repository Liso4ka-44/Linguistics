<?
    session_start();
	if($_SESSION['aut']!='true'){
		echo"<script>document.location.href='index.php';</script>";
		exit();
	}
    include('connect.php');
    $query = "SELECT * FROM `announcement`";
    $poisk = mysqli_query($connect, $query);


?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Анонсы</title>
</head>
  	<?
		include('header.php');
		include('nav.php');
	?>
<body>
<main>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="test.css">
<div class="container"> <div class=" text-center mt-5 ">
    <h1>Анонсы</h1>
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 ">
                <div class="card-body ">
                    <div class="container">
                        <form action="add/Add_All.php?add=anons" method="post" id="announcement" enctype="multipart/form-data" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Название </label> <input  type="text" name="Name_announcement" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Дата</label> <input  type="date" name="date_announcement" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Время начала</label> <input  type="time" name="timeStart" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Время окончания</label> <input  type="time" name="timeEnd" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Имя спикера</label> <input  type="text" name="Name_speaker_announcement" class="form-control" required="required" data-error="Заполните"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Инфо о спикере</label> <input  type="text" name="Info_speaker_announcement" class="form-control"  required="required" data-error="Заполните"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Фото спикера</label> <input  type="file" name="Foto_speaker_announcement" class="form-control"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Название программки</label> <input  type="text" required="required" name="Name_prog_announcement" class="form-control"> </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_email">Программа(ки)</label> <input  type="file" required="required" name="Programm_announcement" class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_message">Информация</label> <textarea  name="info_announcement" class="form-control"  rows="4" data-error="Заполните" id = "editor"></textarea> </div>
                                        <script>
                                            let myEditor
                                            ClassicEditor
                                            .create( document.querySelector( '#editor' ) ).then(editor=>{
                                            myEditor = editor
                                            })
                                            .catch( error => {
                                            console.error( error );
                                            } );
                                        </script>
                                    </div>
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

<div class="container">
	<h1 >Список анонсов</h1>
	
	<?  
      while(($row = mysqli_fetch_assoc($poisk)) != false){
        $date =date("Y-m-d",strtotime($row['announcement_Date']));
        $time = explode('-', $row["announcement_Time"], 3);
	
		if($row["announcement_foto_speaker"]!=''){
			$phototospeaker="<img src='".$row["announcement_foto_speaker"]."' name='photo'>";
		}
		else{
			$phototospeaker="<h1 class='text-center'>Фото спикера нету</h1>";
		}
        echo " <div class='row '>
        <div class='col-lg-12 mx-auto'>
            <div class='card mt-2 mx-auto p-4 '>
                <div class='card-body '>
                    <div class='container'>
                        <form action='update/ALL_EDIT.php?update=uppannouncement&ID_announcement=".$row['ID_announcement']."' method='post' id='announcement' enctype='multipart/form-data' role='form'>
                            <div class='controls'>
                                <div class='row'>
                                    <div class='col-md-3'>
                                        <div class='form-group'> <label for='form_name'>Название </label> <input  type='text' name='announcement_name_konf'  value = '".$row["announcement_name_konf"]."' class='form-control' > </div>
                                    </div>
                                    <div class='col-md-3'>
                                        <div class='form-group'> <label for='form_lastname'>Дата</label> <input  value='$date' type='date' name='date' class='form-control' > </div>
                                    </div>
									<div class='col-md-3'>
										<div class='form-group'> <label for='form_email'>Время начало</label> <input  type='time' name='timeStart'  value='".$time['0']."' class='form-control' > </div>
									</div>
									<div class='col-md-3'>
										<div class='form-group'> <label for='form_email'>Время окончания</label> <input  type='time' name='timeEnd' value='".$time['1']."' class='form-control' > </div>
									</div>
									<div class='col-md-3'>
										<div class='form-group'> <label for='form_email'>Имя спикера</label> <input value = '".$row["announcement_Name_speaker"]."' type='text' name='announcement_Name_speaker' class='form-control'> </div>
									</div>
									<div class='col-md-3'>
										<div class='form-group'> <label for='form_email'>Инфо о спикере</label> <input value = '".$row["announcement_info_speaker"]."' type='text' name='announcement_info_speaker' class='form-control' > </div>
									</div>


									

                                    
                                    <div class='col-md-6'>
                                        <div class='form-group'> <label for='form_message'>Информация</label> <textarea  name='announcement_info_konf' class='form-control'  rows='3' id = 'editor".$row['ID_announcement']."'>".$row["announcement_info_konf"]."</textarea> </div>
                                        <script>
                                            let myEditor".$row['ID_announcement']."
                                            ClassicEditor
                                            .create( document.querySelector( '#editor".$row['ID_announcement']."' ) ).then(editor=>{
                                            myEditor".$row['ID_announcement']." = editor
                                            })
                                            .catch( error => {
                                            console.error( error );
                                            } );
                                        </script>
                                    </div>
                                    
                              

                                </div>
								<div class='row'>
									<div class='col-md-12 text-center'>
										<label for='form_email'>Изменения в тексте</label><input type='submit' class='btn btn-success btn-send pt-2 btn-block ' value='Отправить'> 
									</div>
								</div>
                            </div>
                        </form>
						<h3 class='text-center'>Фото спикера</h3>
						<form action='update/ALL_EDIT.php?update=newanonsphoto&ID_announcement=".$row['ID_announcement']."' method='post'  enctype='multipart/form-data'>
							<div class='controls'>
								<div class='row'>
									<div class='col-md-8 photo_sp'>
										$phototospeaker
									</div>
								</div>
								<div class='row'>
									<div class='col-md-6'>
										<div class='form-group'> <label for='form_email'>Загрузить фото спикера</label> <input  type='file' name='newphotoanons' class='form-control' > </div>
									</div>
									<div class='col-md-6'>
										<label for='form_email'>Сохранить новую фотографию</label><input type='submit' class='btn btn-success btn-send pt-2 btn-block ' value='Сохранить'> 
									</div>
								</div>
							</div>
						</form>
                        ";
                         // запрос на порграммки
                        $query_prog = "SELECT playbill.`road`, playbill.`name_playbill`, playbill.`ID_playbill`, playbill.`ID_anons`, anons.`ID_announcement` FROM `playbill` playbill LEFT JOIN `announcement` anons  ON playbill.`ID_anons` = anons.`ID_announcement`  WHERE anons.`ID_announcement` = ".$row['ID_announcement']."";
                        $poisk__prog = mysqli_query($connect, $query_prog);
                        while(($row_prog = mysqli_fetch_assoc($poisk__prog)) != false){
                            $idanons = $row["ID_announcement"]; 
                            $idan = (integer)$idanons;
                            $idanonsp = $row_prog["ID_anons"]; 
                            $idpl = (integer)$idanonsp;
                            if($idan==$idpl){
                            echo "<form action='update/ALL_EDIT.php?update=upplaybill&ID_playbill=".$row_prog['ID_playbill']."' method='post' id='announcement' enctype='multipart/form-data' role='form'>
                                <div class = 'program_anons_update'>
                                    <div class='col-md-6 link__playbill'>
                                        <div class='form-group'>
                                            <a href='".$row_prog["road"]."' download>
                                                <p class='text-center'>".$row_prog["name_playbill"]."</p>
                                            </a>
                                        </div>
                                </div>
                                <div class='col-md-6'>
                                    <label for='form_email'>Удалить программку</label><button type='submit' class='btn btn-success btn-send pt-2 btn-block' name = 'delet' value='".$row_prog['ID_playbill']."'> Удалить</button>
                                </div>
                            </div>
                            </form>";
                        }
                    }
                       echo "
                       <form action = 'add/Add_All.php?add=prog' method = 'post' enctype='multipart/form-data'>
                            <div class = 'Add__prog program_anons_update'>
                                <div class='col-md-3'>
                                    <label for='form_email'>Добавить название</label><input type='text' required name = 'Name_prog_announcement' class='form-control'> 
                                </div>
                                <div class='col-md-3'>
                                    <label for='form_email'>Добавить программку</label><input type='file' required name = 'Programm_announcement1' class='form-control'> 
                                </div>
                                <div class='col-md-6'>
                                    <label for='form_email'>Добавить программку</label><button type='submit' class='btn btn-success btn-send pt-2 btn-block' name = 'add__prog__button' value='".$row['ID_announcement']."'> Добавить</button>
                                </div>
                            </div>
                        </form>
						<form action='update/ALL_EDIT.php?update=dellanons&ID_announcement=".$row['ID_announcement']."'  method='post'  enctype='multipart/form-data'>
							<div class='controls'>
								<div class='row'>
									<div class='col-md-12'>
										<input type='submit' class='btn btn-success btn-send pt-2 btn-block ' value='Удалить анонс'> 
									</div>
								</div>
							</div>
						</form>
                    </div>
                </div>
            </div> 
        </div> 
    </div>";}
    ?>

	</div>
</main>

</body>
</html>
