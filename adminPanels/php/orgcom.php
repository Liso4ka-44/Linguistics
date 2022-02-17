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
            <div class="addOrg">
                <div class="description">
                    <label class="ruText">ФИО <textarea></textarea></label>
                    <label class="enText">Name <textarea></textarea></label>
                </div>
                <label class="file orgcomm_file_center">
                    Фотография
                    <input type="file">
                </label>
                <div class="description">
                    <label class="ruText">Должность <textarea></textarea></label>
                    <label class="enText">Post <textarea></textarea></label>
                </div>
                <div class="description">
                    <label class="ruText">Ссылка <textarea></textarea></label>
                    <label class="enText">Link <textarea></textarea></label>
                </div>
                <button type="submit" class="btn">Добавить представителя</button>
            </div>
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
                            <div>
                                <label class="ruText">ФИО <textarea>'.$row["name_per_ru"].'</textarea></label>
                                <img src="../img/icon/update.svg" alt="">
                            </div>
                            <div>
                                <label class="enText">Name <textarea>'.$row["name_per_en"].'</textarea></label>
                                <img src="../img/icon/update.svg" alt="">
                            </div>
                            <div>
                                <label class="ruText">Должность <textarea>'.$row["position_ru"].'</textarea></label>
                                <img src="../img/icon/update.svg" alt="">
                            </div>
                            <div>
                                <label class="enText">Post <textarea>'.$row["position_en"].'</textarea></label>
                                <img src="../img/icon/update.svg" alt="">
                            </div>
                            <div class="imgEditing">
                                <h4>Фотография</h4>
                                <div class="imgEditing__content">
                                    <div class="imgEditing__img">
                                        <img src="'.'../'.$row["photo_per"].'">
                                    </div>
                                    <div class="imgEditing__input">
                                        <input type="file">
                                        <button type="submit">Загрузить новое фото</button>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <label class="ruText">Ссылка <textarea>'.$row["link_per_ru"].'</textarea></label>
                                <img src="../img/icon/update.svg" alt="">
                            </div>
                            <div>
                                <label class="enText">Link <textarea>'.$row["link_per_en"].'</textarea></label>
                                <img src="../img/icon/update.svg" alt="">
                            </div>
                        </div>
                        <div class="btnDelet">
                            <button type="submit" class="delete__btn">Удалить представителя</button>
                        </div>

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