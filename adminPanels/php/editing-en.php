<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
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
                    <a href="#">Анонс</a>
                    <a href="#">Информация </a>
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
                    <h3>Конференция <?php echo $date_head ?></h3>
                    <div class="nameKonf">
                    <?php
                        $info = mysqli_query($connect, "SELECT * FROM `conferences` WHERE `ID_conf` = $_GET[id_konf]");
                        while (($row = mysqli_fetch_assoc($info)) != false) {
                            echo
                            '<form action="add_edit\en_edit.php?update=up_name_conf&ID_konf=' . $_GET["id_konf"] . '" method="post" enctype="multipart/form-data" >
                        <div class="description editing_icon_right ">
                            <div>
                                <label class="enText">Name <textarea name ="name_en">' . $row["Name_conf_en"] . '</textarea></label>
                                <button type="submit" name="name_conf"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                            <div>
                                <label class="enText">Conference conception <textarea name="concept_en" id="editor5">' . $row["an_conception_en"] . '</textarea></label>
                                <button type="submit" name="concept"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </div>
                        <div class="anons">
                            <h3>Анонс</h3>
                            <div class="description editing_icon_right ">
                                <div>
                                    <label class="enText">Introduction<textarea name="introduction_en">' . $row["anons_name_en"] . '</textarea></label>
                                    <button type="submit" name="intro"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                                <div>
                                    <label class="enText">Information about announcement <textarea name="infoan_en" id="editor">' . $row["info_anons_en"] . '</textarea></label>
                                    <button type="submit" name="an_info"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="pastKonf">
                            <h3>Информация о прошедшей конференции</h3>
                            <div class="description editing_icon_right">
                                <div>
                                    <label class="enText"><textarea name="info_en" id="editor">' . $row["info_en"] . '</textarea></label>
                                    <button type="submit" name="info"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                        </form>'
                        ;}
                    ?>
                        <div class="speack">
                            <div class="speack__add">
                                <h3>Спикеры</h3>
                                <p class="warning">если спикер был добавлен ранее на русском, он уже имеется в списке</p>
                                <div class="description">
                                    <label class="enText">Name
                                        <textarea></textarea>
                                    </label>
                                    <label class="enText">Link
                                        <textarea></textarea>
                                    </label>
                                </div>
                                <div class="file_center">
                                    <label>
                                        Фотография
                                        <input type="file">
                                    </label>
                                </div>
                                <label class="enText info__spaeker">
                                    Information about speaker
                                    <textarea id="editor"></textarea>
                                </label>
                            </div>
                            <div class="speack__list">
                            <?php $count = 1;
                        $speakers = mysqli_query($connect, "SELECT * FROM `speakers` WHERE `ID_conf` = $_GET[id_konf]");
                        while (($row = mysqli_fetch_assoc($speakers)) != false) {
                            echo
                            '<div class="speack__item">
                                    <h4>Спикер' . ' ' . $count . '</h4>
                                    <div class="description editing_icon_right">
                                        <div>
                                            <label class="enText">Name <textarea "name_sp_en">' . $row["name_ru"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                    </div>
                                    <form class="imgEditing" action="" method="post" enctype="multipart/form-data">
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
                                    <div class="editing_icon_right">
                                        <div>
                                            <label class="enText">Information about speaker
                                                <textarea id="editor" name="info_sp_en">' . $row["info_en"] . '</textarea>
                                            </label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        <div>
                                            <label class="enText">Link <textarea name="link_sp_en">' . $row["linkSP_en"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
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
                        <div class="reviews">
                            <div class="review__add">
                                <h3>Отзывы</h3>
                                <p class="warning">если отзыв был добавлен ранее на английском, он уже имеется в списке</p>
                                <div class="description">
                                    <label class="enText">Name
                                        <textarea></textarea>
                                    </label>
                                    <label class="enText">Post
                                        <textarea></textarea>
                                    </label>
                                </div>
                                <label class="enText info__spaeker">
                                    Текст отзыва
                                    <textarea></textarea>
                                </label>
                                <button type="submit" class="btn">Добавить отзыв</button>
                            </div>
                            <div class="review__list">
                            <?php $count = 1;
                        $feedback = mysqli_query($connect, "SELECT * FROM `feedback` WHERE `ID_conf` = $_GET[id_konf]");
                        while (($row = mysqli_fetch_assoc($feedback)) != false) {
                            echo
                            '<div class="review__item">
                                    <h4>Отзыв' . ' ' . $count . '</h4>
                                    <div class="editing_icon_right">
                                        <div>
                                            <label class="enText">Name <textarea name="feeabackn_en">' . $row["Name_feedback_en"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        <div>
                                            <label class="enText">Post <textarea name="post_en">' . $row["post_en"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        <div>
                                            <label class="enText">Text of feedback <textarea name="text_en">' . $row["feedback_en"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                    </div>
                                    <div class="btnDelet">
                                        <button type="submit" class="delete__btn">Удалить отзыв</button>
                                    </div>
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