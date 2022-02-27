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
                            '
                        <div class="description editing_icon_right ">
                            <div>
                                <label class="ruText">Название <textarea name="name_ru">' . $row["Name_conf_ru"] . '</textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                            <div>
                                <label class="ruText">Концепция конференции <textarea name="concep_ru">' . $row["an_conception_ru"] . '</textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </div>
                        <div class="anons">
                            <h3>Анонс</h3>
                            <div class="description editing_icon_right ">
                                <div>
                                    <label class="ruText">Вступление <textarea name="introduction_ru">' . $row["anons_name_ru"] . '</textarea></label>
                                    <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                                <div>
                                    <label class="ruText">Информация об анонсе <textarea name="infoan_ru">' . $row["info_anons_ru"] . '</textarea></label>
                                    <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="pastKonf">
                            <h3>Информация о прошедшей конференции</h3>
                            <div class="description editing_icon_right">
                                <div>
                                    <label class="ruText"><textarea name="info_ru">' . $row["info_ru"] . '</textarea></label>
                                    <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </div>
                        </div>'
                        ;}
                    ?>

                        <div class="speack">
                            <div class="speack__add">
                                <h3>Спикеры</h3>
                                <p class="warning">если спикер был добавлен ранее на английском, он уже имеется в списке</p>
                                <div class="description">
                                    <label class="ruText">ФИО
                                        <textarea></textarea>
                                    </label>
                                    <label class="ruText">Ссылка
                                        <textarea></textarea>
                                    </label>
                                </div>
                                <div class="file_center">
                                    <label>
                                        Фотография
                                        <input type="file">
                                    </label>
                                </div>
                                <label class="ruText info__spaeker">
                                    Информация о спикере
                                    <textarea></textarea>
                                </label>
                                <button type="submit" class="btn">Добавить спикера</button>
                            </div>

                            <div class="speack__list">
                        <?php $count = 1;
                        $speakers = mysqli_query($connect, "SELECT * FROM `speakers` WHERE `ID_conf` = $_GET[id_konf]");
                        while (($row = mysqli_fetch_assoc($speakers)) != false) {
                            echo
                            '<div class="speack__item">
                                    <h4>Спикер' . ' ' . $count . '</h4>
                                    <div class="description">
                                        <label class="ruText">ФИО
                                            <textarea name="name_sp_ru">' . $row["name_ru"] . '</textarea>
                                        </label>
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
                                            <label class="ruText">Информация о спикере <textarea name="info_sp_ru">' . $row["info_ru"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        <div>
                                            <label class="ruText">Ссылка на информацию о спикере <textarea name="link_sp_ru">' . $row["linkSP_ru"] . '</textarea></label>
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
                                    <label class="ruText">ФИО
                                        <textarea></textarea>
                                    </label>
                                    <label class="ruText">Должность
                                        <textarea></textarea>
                                    </label>
                                </div>
                                <label class="ruText info__spaeker">
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
                                            <label class="ruText">ФИО <textarea name="feeabackn_ru">' . $row["Name_feedback_ru"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        <div>
                                            <label class="ruText">Должность <textarea name="post_ru">' . $row["post_ru"] . '</textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        <div>
                                            <label class="ruText">Текст отзыва <textarea name="text_ru">' . $row["feedback_ru"] . '</textarea></label>
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