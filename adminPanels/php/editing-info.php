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
                    <a href="#">Дата</a>
                    <a href="#">Сборники материалов</a>
                    <a href="#">Фотографии</a>
                    <a href="#">Видео</a>
                    <a href="#">Партнеры </a>
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
                    <div class="datelist">
                        <?php $count = 1;
                        $all_dates = mysqli_query($connect, "SELECT * FROM `dates` WHERE `text_ru` NOT LIKE 'Конференция%' AND `ID_conf` = $_GET[id_konf]");
                        while (($row = mysqli_fetch_assoc($all_dates)) != false) {
                            $f_date = date("Y-m-d", strtotime($row['date_from']));
                            $s_date = date("Y-m-d", strtotime($row['date_to']));
                            echo
                            '
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
                        </div> ';
                            $count++;
                        }
                        ?>
                    </div>
                    <a href="#" class="watch_more">
                        Смотреть все даты
                        <img src="../img/icon/down.svg" alt="" class="slide">
                    </a>

                    <div class="eddit__info_programm">
                        <h2>Программки, информационные письма</h2>
                        <div class="description">
                            <label class="ruText file">
                                Файл
                                <input type="file">
                            </label>
                            <label class="ruText">
                                Название
                                <textarea></textarea>
                            </label>
                        </div>
                        <div class="description">
                            <label class="enText file">
                                File
                                <input type="file">
                            </label>
                            <label class="enText">
                                Name
                                <textarea></textarea>
                            </label>
                        </div>
                        <button class="btn">Добавить программку</button>
                        <div class="programm__list">
                            <?php $count = 1;
                            $all_dates = mysqli_query($connect, "SELECT * FROM `playbill` WHERE `ID_conf` = $_GET[id_konf]");
                            while (($row = mysqli_fetch_assoc($all_dates)) != false) {

                                echo
                                '
                           <div class="programm__item">
                                <h3>Программка' . ' ' . $count . '</h3>
                                <div class="description editing_icon_right ">
                                    <div>
                                        <label class="ruText">Название<textarea>' . $row["name_playbill_ru"] . '</textarea></label>
                                        <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                    </div>
                                </div>
                                
                                    <h4>Файл</h4>
                                    <div class="imgEditing__content">
                                        <div class="imgEditing__img">
                                            <a href="' . $row["road_ru"] . '">' . $row["name_playbill_ru"] . '</a>
                                        </div>
                                        <div class="imgEditing__input">
                                            <input type="file" name="photo">
                                            <button type="submit">Загрузить новое фото</button>
                                        </div>
                                    </div>
                                
                                <div class="description editing_icon_right ">
                                    <div>
                                        <label class="enText">Name <textarea>' . $row["name_playbill_en"] . '</textarea></label>
                                        <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                    </div>
                                </div>
                                <form class="imgEditing" action="add_edit\orgcom_edit.php?update=up_photo&ID_per=' . $row['ID_per'] . '" method="post" enctype="multipart/form-data" >
                                    <h4>Файл</h4>

                                    <div class="imgEditing__content">
                                        <div class="imgEditing__img">
                                        <a href="' . $row["road_en"] . '">' . $row["name_playbill_en"] . '</a>
                                        </div>
                                        <div class="imgEditing__input">
                                            <input type="file">
                                            <button type="submit">Загрузить новое фото</button>
                                        </div>
                                    </div>
                                    </form>
                                 </div>   ';
                                $count++;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="collectionsMaterials">
                        <div class="addCollections">
                            <h3>Cборники материалов</h3>
                            <div class="description">
                                <label class="ruText">Описание <textarea></textarea></label>
                                <label class="enText">Describtion <textarea></textarea></label>
                            </div>
                            <div class="cover">
                                <label class="file">
                                    Обложка
                                    <input type="file">
                                </label>
                                <label class="file">
                                    Файл
                                    <input type="file">
                                </label>
                            </div>
                            <div class="elibrary">
                                <label>Ссылка elibrary <textarea></textarea></label>
                            </div>
                        </div>
                        <button type="submit" class="btn">Добавить сборник</button>
                        <div class="collectionsMaterialsList">
                            <h3>Список сборников материалов</h3>
                            <?php $count = 1;
                            $all_dates = mysqli_query($connect, "SELECT * FROM `el_collection` WHERE `ID_conf` = $_GET[id_konf]");
                            while (($row = mysqli_fetch_assoc($all_dates)) != false) {

                                echo
                                '
                            <div class="collectionsMaterialsItem">
                            <h3>Сборник' . ' ' . $count . '</h3>
                                <div class="description editing_icon_right ">
                                    <div>
                                        <label class="ruText">Название <textarea>' . $row["Name_documents_ru"] . '</textarea></label>
                                        <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                    </div>
                                    <div>
                                        <label class="enText">Name <textarea>' . $row["Name_documents_en"] . '</textarea></label>
                                        <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                    </div>
                                    <form class="imgEditing" action="add_edit\orgcom_edit.php?update=up_photo&ID_per=' . $row['ID_per'] . '" method="post" enctype="multipart/form-data">
                                        <h4>Фотография</h4>
                                        <div class="imgEditing__content">
                                            <div class="imgEditing__img">
                                                <img src="' . '../' . $row["cover"] . '">
                                            </div>
                                            <div class="imgEditing__input">
                                                <input type="file" name="photo">
                                                <button type="submit">Загрузить новое фото</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="elibrary">
                                        <label>Ссылка elibrary <textarea>' . $row["link"] . '</textarea></label>
                                    </div>
                                    <form class="imgEditing" action="add_edit\orgcom_edit.php?update=up_photo&ID_per=' . $row['ID_per'] . '" method="post" enctype="multipart/form-data">
                                        <h4>Файл</h4>
                                        <div class="imgEditing__content">
                                            <div class="imgEditing__img">
                                                <a href="' . $row["Road_to_documents"] . '">Посмотреть файл</a>
                                            </div>
                                            <div class="imgEditing__input">
                                                <input type="file">
                                                <button type="submit">Загрузить новый файл</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="btnDelet">
                                    <button type="submit" class="delete__btn">Удалить сборник материалов</button>
                                </div>
                            </div>
                            ';
                                $count++;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="media">
                        <h3>Главная фотография</h3>
                        <div class="mainPfoto">
                            <form class="imgEditing" action="add_edit\orgcom_edit.php?update=up_photo&ID_per=' . $row['ID_per'] . '" method="post" enctype="multipart/form-data">
                                <h4>Фотография</h4>
                                <?php
                                $main_photo = mysqli_query($connect, "SELECT `main_photo` FROM `conferences` WHERE `ID_conf` = $_GET[id_konf]");
                                $poiskk = mysqli_query($connect, $main_photo);
                                while (($row1 = mysqli_fetch_assoc($poiskk)) != false) {
                                    $main = $row1['main_photo'];
                                }
                                ?>
                                <div class="imgEditing__content">
                                    <div class="imgEditing__img">
                                        <img src="<?php echo $main ?>">
                                    </div>
                                    <div class="imgEditing__input">
                                        <input type="file" name="photo">
                                        <button type="submit" class="btn">Загрузить новое фото</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="PhotoKonf">
                            <div class="addPhoto">
                                <h3>Фотографии конференции</h3>
                                <input type="file">
                                <button type="submit" class="btn">Загрузить фотографию(ии)</button>
                            </div>
                            <div class="PhotoKonf__list">
                                <div class="PhotoKonf__item">
                                    <div class="PhotoKonf__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="PhotoKonf__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>
                                <div class="PhotoKonf__item">
                                    <div class="PhotoKonf__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="PhotoKonf__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>
                                <div class="PhotoKonf__item">
                                    <div class="PhotoKonf__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="PhotoKonf__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>
                                <div class="PhotoKonf__item">
                                    <div class="PhotoKonf__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="PhotoKonf__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>
                                <div class="PhotoKonf__item">
                                    <div class="PhotoKonf__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="PhotoKonf__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>
                                <div class="PhotoKonf__item">
                                    <div class="PhotoKonf__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="PhotoKonf__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>
                                <div class="PhotoKonf__item">
                                    <div class="PhotoKonf__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="PhotoKonf__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>
                                <div class="PhotoKonf__item">
                                    <div class="PhotoKonf__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="PhotoKonf__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="video">
                            <h3>Видео конференции</h3>
                            <div class="description editing_icon_right ">
                                <div>
                                    <label>Ссылка на видео из ютуб
                                        <textarea></textarea>
                                    </label>
                                    <button type="submit" class="btn">Добавить</button>
                                </div>
                            </div>
                            <div class="videoList">
                                <div class="video__item">
                                    <div class="video__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="video__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="partners">
                        <div class="addPartners">
                            <h3>Партнеры конференции</h3>
                            <input type="file">
                            <button type="submit" class="btn">Загрузить фотографию(ии)</button>
                        </div>
                        <div class="partnersList">
                            <div class="partners__item">
                                <div class="partners__delet">
                                    <img src="/adminPanels/img/icon/delete.png" alt="">
                                </div>
                                <div class="partners__photo">
                                    <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</body>

</html>