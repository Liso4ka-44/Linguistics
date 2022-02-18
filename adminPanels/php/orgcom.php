<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js" type="text/javascript"></script>
    <title>Оргкомитет</title>
</head>

<body>
    <?php
    include "navigation.php";
    ?>
    <main>
        <div class="main__content">
            <h2>Добавление и редактирование оргкомитета</h2>
                <form action="add_edit\orgcom_add.php" method="post" enctype="multipart/form-data" role="form">
                    <div class="addOrg">
                        <div class="description">
                            <label class="ruText">ФИО <textarea name="name_ru"></textarea></label>
                            <label class="enText">Name <textarea name="name_en"></textarea></label>
                        </div>
                            <label class="file orgcomm_file_center">
                                Фотография
                                    <input type="file" name="photo">
                            </label>
                        <div class="description">
                            <label class="ruText">Должность <textarea name="post_ru"></textarea></label>
                            <label class="enText">Post <textarea name="post_en"></textarea></label>
                        </div>
                        <div class="description">
                            <label class="ruText">Ссылка <textarea name="url_ru"></textarea></label>
                            <label class="enText">Link <textarea name="url_en"></textarea></label>
                        </div>
                            <button type="submit" class="btn">Добавить представителя</button>
                    </div>
                </form>

            <div class="orgcommitet">
                <div class="orgcommitet__list">
                <?php 
                include('connect.php');
                $count = 1;
                            $query = "SELECT * FROM `committee`";
                            $poisk = mysqli_query($connect, $query);
                            while(($row = mysqli_fetch_assoc($poisk)) != false){
                            
                    echo'<div class="orgcommitet__item">
                        <h4>Представитель'.' '.$count.'</h4>
                        <div class="description editing_icon_right ">
                        <form action="add_edit\orgcom_edit.php?update=up_name_ru&ID_per='.$row['ID_per'].'" method="post" enctype="multipart/form-data" >
                            <div>
                                <label class="ruText">ФИО <textarea name = "name_ru">'.$row["name_per_ru"].'</textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </form>
                        <form action="add_edit\orgcom_edit.php?update=up_name_en&ID_per='.$row['ID_per'].'" method="post" enctype="multipart/form-data" >
                            <div>
                                <label class="enText">Name <textarea name = "name_en">'.$row["name_per_en"].'</textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </form>
                        <form action="add_edit\orgcom_edit.php?update=up_post_ru&ID_per='.$row['ID_per'].'" method="post" enctype="multipart/form-data" >
                            <div>
                                <label class="ruText">Должность <textarea name = "post_ru">'.$row["position_ru"].'</textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </form>
                        <form action="add_edit\orgcom_edit.php?update=up_post_en&ID_per='.$row['ID_per'].'" method="post" enctype="multipart/form-data" >
                            <div>
                                <label class="enText">Post <textarea name = "post_en">'.$row["position_en"].'</textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </form>
                            <div class="imgEditing">
                                <h4>Фотография</h4>
                                <form action="add_edit\orgcom_edit.php?update=up_photo&ID_per='.$row['ID_per'].'" method="post" enctype="multipart/form-data" >
                                <div class="imgEditing__content">
                                    <div class="imgEditing__img">
                                        <img src="'.'../'.$row["photo_per"].'">
                                    </div>
                                    <div class="imgEditing__input">
                                        <input type="file" name="photo">
                                        <button type="submit">Загрузить новое фото</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        <form action="add_edit\orgcom_edit.php?update=up_link_ru&ID_per='.$row['ID_per'].'" method="post" enctype="multipart/form-data" >
                            <div>
                                <label class="ruText">Ссылка <textarea name="link_ru">'.$row["link_per_ru"].'</textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </form>
                        <form action="add_edit\orgcom_edit.php?update=up_link_en&ID_per='.$row['ID_per'].'" method="post" enctype="multipart/form-data" >
                            <div>
                                <label class="enText">Link <textarea name="link_en">'.$row["link_per_en"].'</textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </form>
                        </div>
                        <form action="add_edit\orgcom_edit.php?update=del_per&ID_per='.$row['ID_per'].'" method="post" enctype="multipart/form-data" >
                        <div class="btnDelet">
                            <button type="submit" class="delete__btn">Удалить представителя</button>
                        </div>
                        </form>
                    </div>';
                    $count++;
                    }
                ?>
                </div>
        </div>
        </div>
        </div>
    </main>

</body>

</html>