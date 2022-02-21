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
                        <form action="add_edit\general_edit.php?update=up_konf_date&ID_konf=<?php echo $_GET["id_konf"] ?>" method="post" enctype="multipart/form-data">
                            <div class="date__editing">
                                <label>От <input type="date" name="date_from" value="<?php echo $date_from ?>"></label>
                                <label>До <input type="date" name="date_to" value="<?php echo $date_to ?>"></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </form>
                    </div>

                    <form action="add_edit\general_add.php?add=add_dates&ID_konf=<?php echo $_GET["id_konf"] ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="dateImportant">
                            <h2>Важные даты</h2>
                            <p class="warning">если дата не является промежутком,
                                продублируйте её в обе формы
                            </p>

                            <div class="date__editing">
                                <label>От <input type="date" name="date_from"></label>
                                <label>До <input type="date" name="date_to"></label>
                            </div>
                            <div class="description">
                                <label class="ruText">Описание <textarea name="text_ru"></textarea></label>
                                <label class="enText">Describtion <textarea name="text_en"></textarea></label>
                            </div>
                            <button type="submit" class="btn">Добавить дату</button>
                        </div>
                    </form>

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
                            <form action="add_edit\general_edit.php?update=up_dates&ID_konf=' . $_GET["id_konf"] . '&ID_date=' . $row["ID_date"] . '" method="post" enctype="multipart/form-data" >
                            <div class="date__editing">
                                <div>
                                    <label>От <input type="date" name = "date_from" value="' . $f_date . '"></label> 
                                    <label>До <input type="date" name = "date_to" value="' . $s_date . '"></label>
                                </div>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                            </form>
                            <div class="description editing_icon_right">
                            <form action="add_edit\general_edit.php?update=up_desc_ru&ID_konf=' . $_GET["id_konf"] . '&ID_date=' . $row["ID_date"] . '" method="post" enctype="multipart/form-data" >
                                <div>
                                    <label class="ruText">Описание <textarea name = "text_ru">' . $row["text_ru"] . '</textarea></label>
                                    <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </form>
                            <form action="add_edit\general_edit.php?update=up_desc_en&ID_konf=' . $_GET["id_konf"] . '&ID_date=' . $row["ID_date"] . '" method="post" enctype="multipart/form-data" >
                                <div>
                                    <label class="enText">Describtion <textarea name = "text_en">' . $row["text_en"] . '</textarea></label>
                                    <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </form>
                            </div>
                            <form action="add_edit\general_edit.php?update=del_date&ID_konf=' . $_GET["id_konf"] . '&ID_date=' . $row["ID_date"] . '" method="post" enctype="multipart/form-data" >
                            <div class="btnDelet">
                                <button type="submit" class="delete__btn">Удалить дату</button>
                            </div>
                            </form>
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
                        <form action="add_edit\general_add.php?add=add_playbill&ID_konf=<?php echo $_GET["id_konf"] ?>" method="post" enctype="multipart/form-data" role="form">
                            <div>
                                <label class="ruText file">
                                    Файл
                                    <input type="file" name="playbill_ru">
                                </label>
                                <label class="ruText">
                                    Название
                                    <textarea name="name_ru"></textarea>
                                </label>
                            </div>
                            <div>
                                <label class="enText file">
                                    File
                                    <input type="file" name="playbill_en">
                                </label>
                                <label class="enText">
                                    Name
                                    <textarea name="name_en"></textarea>
                                </label>
                            </div>
                            <button class="btn">Добавить программку</button>
                        </form>
                        <div class="programm__list">
                            <?php $count = 1;
                            $playbill = mysqli_query($connect, "SELECT * FROM `playbill` WHERE `ID_conf` = $_GET[id_konf]");
                            while (($row = mysqli_fetch_assoc($playbill)) != false) {

                                echo
                                '
                                <div class="programm__item">
                                    <h3>Программка' . ' ' . $count . '</h3>
                                    <form action="add_edit\general_edit.php?update=up_plname_ru&ID_konf=' . $_GET["id_konf"] . '&ID_playbill=' . $row["ID_playbill"] . '" method="post" enctype="multipart/form-data" >
                                    <div class="description editing_icon_right ">
                                        <div>
                                            <label class="ruText">Название<textarea name="name_ru">' . $row["name_playbill_ru"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                    </div>
                                    </form>
                                    <form class="imgEditing" action="add_edit\general_edit.php?update=up_file_ru&ID_konf=' . $_GET["id_konf"] . '&ID_playbill=' . $row["ID_playbill"] . '" method="post" enctype="multipart/form-data" >
                                        <h4>Файл</h4>
                                        <div class="imgEditing__content">
                                            <div class="imgEditing__img">
                                                <a href="' . $row["road_ru"] . '">' . $row["name_playbill_ru"] . '</a>
                                            </div>
                                            <div class="imgEditing__input">
                                                <input type="file" name="playbill_ru">
                                                <button type="submit">Загрузить новый файл</button>
                                            </div>
                                        </div>
                                        </form>
                                    <form action="add_edit\general_edit.php?update=up_plname_en&ID_konf=' . $_GET["id_konf"] . '&ID_playbill=' . $row["ID_playbill"] . '" method="post" enctype="multipart/form-data" >    
                                    <div class="description editing_icon_right ">
                                        <div>
                                            <label class="enText">Name <textarea name="name_en">' . $row["name_playbill_en"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                    </div>
                                    </form>
                                    <form class="imgEditing" action="add_edit\general_edit.php?update=up_file_en&ID_konf=' . $_GET["id_konf"] . '&ID_playbill=' . $row["ID_playbill"] . '" method="post" enctype="multipart/form-data" >
                                        <h4>Файл</h4>
                                        <div class="imgEditing__content">
                                            <div class="imgEditing__img">
                                            <a href="' . $row["road_en"] . '">' . $row["name_playbill_en"] . '</a>
                                            </div>
                                            <div class="imgEditing__input">
                                                <input type="file" name="playbill_en">
                                                <button type="submit">Загрузить новый файл</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="add_edit\general_edit.php?update=del_playbill&ID_konf=' . $_GET["id_konf"] . '&ID_playbill=' . $row["ID_playbill"] . '" method="post" enctype="multipart/form-data" >
                                        <div class="btnDelet">
                                            <button type="submit" class="delete__btn">Удалить программку</button>
                                        </div>
                                    </form>
                                </div>';
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
                            $collections = mysqli_query($connect, "SELECT * FROM `el_collection` WHERE `ID_conf` = $_GET[id_konf]");
                            while (($row = mysqli_fetch_assoc($collections)) != false) {

                                echo
                                '<div class="collectionsMaterialsItem">
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
                                $main_ph = mysqli_query($connect, "SELECT `main_photo` FROM `conferences` WHERE `ID_conf` = $_GET[id_konf]");
                                while (($row = mysqli_fetch_assoc($main_ph)) != false) {

                                    echo '<div class="imgEditing__content">
                                    <div class="imgEditing__img">
                                        <img src="' . '../' . $row["main_photo"] . '">
                                    </div>
                                    <div class="imgEditing__input">
                                        <input type="file" name="photo">
                                        <button type="submit" class="btn">Загрузить новое фото</button>
                                    </div>
                            </div>';
                                }
                                ?>
                            </form>
                        </div>
                        <div class="PhotoKonf">
                            <div class="addPhoto">
                                <h3>Фотографии конференции</h3>
                                <div class="file_center">
                                    <input type="file">
                                </div>
                                <button type="submit" class="btn">Загрузить фотографию(ии)</button>
                            </div>
                            <div class="PhotoKonf__list">
                                <?php $count = 1;
                                $photos = mysqli_query($connect, "SELECT `photo_conf` FROM `photo_conf` WHERE `ID_conf` = $_GET[id_konf]");
                                while (($row = mysqli_fetch_assoc($photos)) != false) {

                                    echo
                                    '<div class="PhotoKonf__item">
                                    <div class="PhotoKonf__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                    </div>
                                    <div class="PhotoKonf__photo">
                                        <img src="' . '../' . $row["photo_conf"] . '" alt="">
                                    </div>
                        </div>';
                                    $count++;
                                }
                                ?>
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
                                <?php $count = 1;
                                $video = mysqli_query($connect, "SELECT `video_conf` FROM `video_conf` WHERE `ID_conf` = $_GET[id_konf]");
                                while (($row = mysqli_fetch_assoc($video)) != false) {

                                    echo '<div class="video__item">
                                    <div class="video__delet">
                                        <img src="/adminPanels/img/icon/delete.png" alt="">
                                        <iframe src="https://www.youtube.com/embed/' . $row["video_conf"] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="video__photo">
                                        <img src="/adminPanels/konf/2018.03.21/foto/IMG_0862.jpg" alt="">
                                    </div>
                                </div>';
                                    $count++;
                                }
                                ?>
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
                            <?php $count = 1;
                            $partners = mysqli_query($connect, "SELECT `logo` FROM `partners` WHERE `ID_conf` = $_GET[id_konf]");
                            while (($row = mysqli_fetch_assoc($partners)) != false) {

                                echo
                                '
                            <div class="partners__item">
                                <div class="partners__delet">
                                    <img src="/adminPanels/img/icon/delete.png" alt="">
                                </div>
                                <div class="partners__photo">
                                    <img src="' . '../' . $row["logo"] . '" alt="">
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