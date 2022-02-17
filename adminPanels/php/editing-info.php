<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js" type="text/javascript"></script>
    <title>Редактирование общей информации</title>
</head>

<body>
    <?php
    include "navigation.php";
    ?>
    <main class="main">
        <div class="container">
            <div class="main__body">
                <div class="main__nav">
                    <a href="">Дата</a>
                    <a href="">Сборники материалов</a>
                    <a href="">Фотографии</a>
                    <a href="">Видео</a>
                    <a href="">Партнеры </a>
                </div>
                <div class="main__content">
                    <?php
                    include('connect.php');
                    $date = "SELECT `ID_conf`, `date_from`, `date_to` FROM `dates` WHERE `text_ru` LIKE 'Конференция%' AND `ID_conf` = $_GET[id_konf]";
                    $poisk = mysqli_query($connect, $date);
                    while (($row = mysqli_fetch_assoc($poisk)) != false) {
                        $date_from = date("Y-m-d", strtotime($row['date_from']));
                        $date_to = date("Y-m-d", strtotime($row['date_to']));
                        $date_head = date("d.m.Y", strtotime($row['date_from']));
                    }
                    ?>
                    <h1>Конференция <?php echo $date_head ?></h1>
                    <div class="date">
                        <h2>Дата конференции</h2>
                        <div class="date__editing">
                            <label>От <input type="date" value="<?php echo $date_from ?>"></label>
                            <label>До <input type="date" value="<?php echo $date_to ?>"></label>
                            <img src="../img/icon/update.svg" alt="">
                        </div>
                    </div>
                    <div class="dateImportant">
                        <h2>Важные даты</h2>
                        <p class="warning">если дата не является промежутком,
                            продублируйте её в обе формы
                        </p>

                        <div class="date__editing">
                            <label>От <input type="date"></label>
                            <label>До <input type="date"></label>
                        </div>
                        <div class="description">
                            <label class="ruText">Описание <textarea></textarea></label>
                            <label class="enText">Describtion <textarea></textarea></label>
                        </div>
                        <button type="submit" class="btn">Добавить дату</button>
                    </div>
                    <?php $count = 1;
                    $all_dates = mysqli_query($connect, "SELECT * FROM `dates` WHERE `text_ru` NOT LIKE 'Конференция%' AND `ID_conf` = $_GET[id_konf]");
                    while (($row = mysqli_fetch_assoc($all_dates)) != false) {
                        $f_date = date("Y-m-d", strtotime($row['date_from']));
                        $s_date = date("Y-m-d", strtotime($row['date_to']));
                        echo
                        '<div class="datelist">
                        <div class="dateitem">
                            <h2>Дата' . ' ' . $count . '</h2>
                            <div class="date__editing">
                                <div>
                                    <label>От <input type="date" value="' . $f_date . '"></label> 
                                    <label>До <input type="date" value="' . $s_date . '"></label>
                                </div>

                                <img src="../img/icon/update.svg" alt="">
                            </div>
                            <div class="description editing_icon_right">
                                <div>
                                    <label class="ruText">Описание <textarea>' . $row["text_ru"] . '</textarea></label>
                                    <img src="../img/icon/update.svg" alt="">
                                </div>
                                <div>
                                    <label class="enText">Describtion <textarea>' . $row["text_en"] . '</textarea></label>
                                    <img src="../img/icon/update.svg" alt="">
                                </div>
                            </div>
                            <div class="btnDelet">
                                <button type="submit" class="delete__btn">Удалить дату</button>
                            </div>
                        </div> </div>';
                        $count++;
                    }
                    ?>
                    <a href="#">Смотреть все даты <img src="../img/icon/down.svg" alt="" class="slide"></a>

                    <div class="eddit__info_programm">
                        <h2>Программки, информационные письма</h2>
                        <div>
                            <label class="ruText file">
                                Файл
                                <input type="file">
                            </label>
                            <label class="ruText">
                                Название
                                <textarea class=""></textarea>
                            </label>
                        </div>
                        <div>
                            <label class="enText file">
                                File
                                <input type="file">
                            </label>
                            <label class="enText">
                                Name
                                <textarea class=""></textarea>
                            </label>
                        </div>
                        <button class="btn">Добавить программку</button>
                        <div class="programm__list">
                            <div class="programm__item">
                                <h3>Программка 1</h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>