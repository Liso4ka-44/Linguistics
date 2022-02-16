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
                    <h1>Конференция 20.02.2020</h1>
                    <div class="date">
                        <h2>Дата конференции</h2>
                        <div class="date__editing">
                            <div>
                                <label>От <input type="date"></label>
                                <label>До <input type="date"></label>
                            </div>

                            <img src="../img/icon/pen.png" alt="">
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
                        <div class="dateitem">
                            <h2>Дата 1</h2>
                            <div class="date__editing">
                                <div>
                                    <label>От <input type="date"></label>
                                    <label>До <input type="date"></label>
                                </div>

                                <img src="../img/icon/pen.png" alt="">
                            </div>
                            <div class="description editing_icon_right">
                                <div>
                                    <label class="ruText">Описание <textarea></textarea></label>
                                    <img src="../img/icon/pen.png" alt="">
                                </div>
                                <div>
                                    <label class="enText">Describtion <textarea></textarea></label>
                                    <img src="../img/icon/pen.png" alt="">
                                </div>
                            </div>
                            <div class="btnDelet">
                                <button type="submit" class="delete__btn">Удалить представителя</button>
                            </div>
                        </div>
                        <a href="#">Смотреть все даты <img src="../img/icon/Vector 3.png" alt="" class="slide"></a>
                    </div>
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