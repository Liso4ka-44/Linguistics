<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js" type="text/javascript"></script>
    <title>Редактирование Ru</title>

</head>

<body>
    <?php
    include "navigation.php";
    ?>
    <main class="main">
        <div class="container">
            <div class="main__body">
                <div class="main__nav">
                    <a href="#">Конференция</a>
                    <a href="#">Спикеры</a>
                    <a href="#">Отзывы</a>
                </div>
                <div class="main__content">

                    <?php
                    include('connect.php');
                    $date = "SELECT `ID_conf`, `date_from`, `date_to` FROM `dates` WHERE `text_ru` LIKE 'Конференция%' AND `ID_conf` = $_GET[id_konf]";
                    $poisk = mysqli_query($connect, $date);
                    while (($row = mysqli_fetch_assoc($poisk)) != false) {
                        $date_head = date("d.m.Y", strtotime($row['date_from']));
                    }
                    ?>
                    <h3 class="top__heading">Конференция <?php echo $date_head ?></h3>
                    <div class="nameKonf">
                        <?php
                        $info = mysqli_query($connect, "SELECT * FROM `conferences` WHERE `ID_conf` = $_GET[id_konf]");
                        while (($row = mysqli_fetch_assoc($info)) != false) {
                            echo
                            '<form action="add_edit\ru_edit.php?update=up_name_conf&ID_konf=' . $_GET["id_konf"] . '" method="post" enctype="multipart/form-data" >
                            <div class="description editing_icon_right ">
                                <div>
                                    <label class="ruText">Название <textarea name="name_ru">' . $row["Name_conf_ru"] . '</textarea></label>
                                    <button type="submit" name="name_conf"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                                
                                <div>
                                    <div class = "editor">
                                        <label class="ruText">Концепция конференции <textarea  name="concept_ru" id="editor8">' . $row["an_conception_ru"] . '</textarea></label>
                                    </div>
                                  <button type="submit" name="concept"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </div>
                        <div class="anons">
                            <h3>Анонс</h3>
                            <div class="description editing_icon_right ">
                                <div>
                                    <label class="ruText">Вступление <textarea name="introduction_ru">' . $row["anons_name_ru"] . '</textarea></label>
                                    <button type="submit" name="intro"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                                <div>
                                <div class = "editor">
                                    <label class="ruText">Информация об анонсе <textarea name="infoan_ru" id="editor9">' . $row["info_anons_ru"] . '</textarea></label>
                                </div>
                                    <button type="submit" name="an_info"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="pastKonf">
                            <h3>Информация о прошедшей конференции</h3>
                            <div class="description editing_icon_right">
                                <div>
                                    <div class = "editor">
                                        <label class="ruText"><textarea name="info_ru" id="editor10">' . $row["info_ru"] . '</textarea></label>
                                    </div>
                                    <button type="submit" name="info"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                        </form>';
                        }
                        ?>

                        <div class="speack">
                            <form action="add_edit\ru_add.php?add=add_speak&ID_konf=<?php echo $_GET["id_konf"] ?>" method="post" enctype="multipart/form-data" role="form">
                                <div class="speack__add">
                                    <h3>Спикеры</h3>
                                    <p class="warning">если спикер был добавлен ранее на английском, он уже имеется в списке</p>
                                    <div class="description">
                                        <label class="ruText">ФИО
                                            <textarea name="namesp"></textarea>
                                        </label>
                                        <label class="ruText">Ссылка
                                            <textarea name="linksp"></textarea>
                                        </label>
                                    </div>
                                    <div class="file_center">
                                        <label>
                                            Фотография
                                            <input type="file" name="photo">
                                        </label>
                                    </div>
                                    <div class="editor">
                                        <label class="ruText info__spaeker">
                                            Информация о спикере
                                            <textarea id="editor11" name="infosp"></textarea>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn" name="add">Добавить спикера</button>
                                </div>
                            </form>

                            <div class="list">
                                <?php
                                $count = 1;
                                $speakers = mysqli_query($connect, "SELECT * FROM `speakers` WHERE `ID_conf` = $_GET[id_konf]");
                                while (($row = mysqli_fetch_assoc($speakers)) != false) {
                                    echo
                                    '<div class="speack__item">
                                        <h4>Спикер' . ' ' . $count . '</h4>
                                        <form action="add_edit\ru_edit.php?update=up_namesp&ID_konf=' . $_GET["id_konf"] . '&ID_speak=' . $row["ID_speak"] . '" method="post" enctype="multipart/form-data" >
                                        <div class="description">
                                            <label class="ruText">ФИО
                                                <textarea name="name_sp_ru">' . $row["name_ru"] . '</textarea>
                                            </label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        </form>
                                        <form class="imgEditing" action="add_edit\ru_edit.php?update=up_sphoto&ID_konf=' . $_GET["id_konf"] . '&ID_speak=' . $row["ID_speak"] . '" method="post" enctype="multipart/form-data" >
                                            <h4>Фотография</h4>
                                            <div class="imgEditing__content">
                                                <div class="imgEditing__img">
                                                <img src="' . '../' . $row["photo"] . '">
                                                </div>
                                                <div class="imgEditing__input">
                                                    <input type="file" name="photo">
                                                    <button type="submit">Загрузить новое фото</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form class="imgEditing" action="add_edit\ru_edit.php?update=up_speaker&ID_konf=' . $_GET["id_konf"] . '&ID_speak=' . $row["ID_speak"] . '" method="post" enctype="multipart/form-data" >
                                        <div class="editing_icon_right">
                                            <div>
                                                <label class="ruText">Информация о спикере <textarea name="info_sp_ru">' . $row["info_ru"] . '</textarea></label>
                                                <button type="submit" name="info"><img src="../img/icon/update.svg" alt=""></button>
                                            </div>
                                            <div>
                                                <label class="ruText">Ссылка на информацию о спикере <textarea name="link_sp_ru">' . $row["linkSP_ru"] . '</textarea></label>
                                                <button type="submit" name="link"><img src="../img/icon/update.svg" alt=""></button>
                                            </div>
                                        </div>
                                        <div class="btnDelet">
                                            <button type="submit" name="delete" class="delete__btn">Удалить представителя</button>
                                        </div>
                                        </form>
                                    </div>';
                                    $count++;
                                }
                                ?>
                            </div>
                            <div class="show__more">
                                <a href="#" class="show__more__link" data-show="list">Показать ещё</a>
                                <img src="../img/icon/down.svg" alt="" class="slide">
                            </div>
                        </div>
                        <div class="reviews">
                            <form action="add_edit\ru_add.php?add=add_feed&ID_konf=<?php echo $_GET["id_konf"] ?>" method="post" enctype="multipart/form-data" role="form">
                                <div class="review__add">
                                    <h3>Отзывы</h3>
                                    <p class="warning">если отзыв был добавлен ранее на английском, он уже имеется в списке</p>
                                    <div class="description">
                                        <label class="ruText">ФИО
                                            <textarea name="name"></textarea>
                                        </label>
                                        <label class="ruText">Должность
                                            <textarea name="post"></textarea>
                                        </label>
                                    </div>
                                    <label class="ruText info__spaeker">
                                        Текст отзыва
                                        <textarea name="text"></textarea>
                                    </label>
                                    <button type="submit" class="btn">Добавить отзыв</button>
                                </div>
                            </form>
                            <div class="review__list">
                                <?php $count = 1;
                                $feedback = mysqli_query($connect, "SELECT * FROM `feedback` WHERE `ID_conf` = $_GET[id_konf]");
                                while (($row = mysqli_fetch_assoc($feedback)) != false) {
                                    echo
                                    '<div class="review__item">
                                    <form action="add_edit\ru_edit.php?update=up_feed&ID_konf=' . $_GET["id_konf"] . '&ID_feed=' . $row["ID_feedback"] . '" method="post" enctype="multipart/form-data" >
                                        <h4>Отзыв' . ' ' . $count . '</h4>
                                        <div class="editing_icon_right">
                                            <div>
                                                <label class="ruText">ФИО <textarea name="name">' . $row["Name_feedback_ru"] . '</textarea></label>
                                                <button type="submit" name="name_b"><img src="../img/icon/update.svg" alt=""></button>
                                            </div>
                                            <div>
                                                <label class="ruText">Должность <textarea name="post">' . $row["post_ru"] . '</textarea></label>
                                                <button type="submit" name="post_b"><img src="../img/icon/update.svg" alt=""></button>
                                            </div>
                                            <div>
                                                <label class="ruText">Текст отзыва <textarea name="text">' . $row["feedback_ru"] . '</textarea></label>
                                                <button type="submit" name="text_b"><img src="../img/icon/update.svg" alt=""></button>
                                            </div>
                                        </div>
                                        <div class="btnDelet">
                                            <button type="submit" name="delete" class="delete__btn">Удалить отзыв</button>
                                        </div>
                                    </form>    
                                    </div>
                                    ';
                                    $count++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>


</html>