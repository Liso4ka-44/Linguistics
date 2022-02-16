<?php include "connect.php";
?>
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
    <title>Добавление</title>
</head>

<body>
    <?php
    include "navigation.php";
    ?>
    <main class="main">
        <div class="container">
            <div class="main__body">
                <div class="main__nav"><a href="">Сведения об анонсе</a><a href="">Важные даты</a><a href="">Программки</a></div>
                <div class="main__content">
                    <div class="information__announcement">
                        <h2>Сведения об анонсе</h2>
                        <div class="main__introductionAnnouncement">
                            <div class="introductionRu">
                                <h4 class="ruText">Вступление анонса</h4><textarea id=""></textarea>
                            </div>
                            <div class="introductionEn">
                                <h4 class="enText">Introduction</h4><textarea></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="editor__list">
                        <div class="editor1">
                            <h4 class="ruText">Информация о конференции</h4><textarea class="edit" id="editor"></textarea>
                        </div>
                        <div class="editor2">
                            <h4 class="enText">Conference information</h4><textarea class="edit" id="editor1"></textarea>
                        </div>
                        <div class="editor3">
                            <h4 class="ruText">Концепция конференции</h4><textarea class="edit" id="editor2"></textarea>
                        </div>
                        <div class="editor4">
                            <h4 class="enText">Conference conception</h4><textarea class="edit" id="editor3"></textarea>
                        </div>
                    </div>
                    <div class="KeysDate">
                        <h2>Важные даты</h2>
                        <div class="dateConf">
                            <h3>Даты конференции</h3>
                            <div class="beetwenDate">
                                <label for="from">От </label>
                                <input type="date" name="" id="from">
                                <label for="to">До </label>
                                <input type="date" name="" id="to">
                            </div>
                            <p>если дата не является промежутком,
                                продублируйте её в обе формы</p>
                        </div>
                        <div class="additionalDates">
                            <h3>Дата 1</h3>
                            <div class="additionalDate">
                                <label for="from">От </label>
                                <input type="date" name="" id="from">
                                <label for="to">До </label>
                                <input type="date" name="" id="to">
                            </div>
                            <div class="description">

                                <label class="ruText">Описание </label>
                                <textarea class="descriptionText" id="descriptionRu"></textarea>

                                <label class="enText">Describtion </label>
                                <textarea class="descriptionText" id="descriptionEn"></textarea>
                            </div>
                            <div class="addAdditionalDates">
                                <a href="#">
                                    <img src="../img/icon/add.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="programs">
                        <h2>Программки,информационные письма</h2>
                        <div class="program">
                            <h3>Документ 1</h3>
                            <input type="file" name="" id="">
                            <label class="ruText">Название
                                <textarea class="programText"></textarea>
                            </label>
                            <input type="file" name="" id="">
                            <label class="enText">Name
                                <textarea class="programText"></textarea>
                            </label>
                        </div>
                        <div class="addAdditionalDates">
                            <a href="#">
                                <img src="../img/icon/add.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <button type="submit" class="main__button">Добавить конференцию</button>
                </div>
            </div>
        </div>
    </main>
</body>

</html>