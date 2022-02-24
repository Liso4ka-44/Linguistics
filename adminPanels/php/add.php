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
    <script src="../js/add.js"></script>
    <title>Добавление</title>
</head>

<body>
    <?php
    include "navigation.php";
    ?>
    <main class="main">
        <div class="container">
            <div class="add">
                <div class="add__nav">
                    <ul class="add__list">
                        <li class="add__item add__item_active_darker" data-nav="1"> <a class="add__link" href="#">Сведения об анонсе</a> </li>
                        <li class="add__item" data-nav="2"><a class="add__link" href="#">Важные даты</a></li>
                        <li class="add__item" data-nav="3"><a class="add__link" href="#"> программки, информационные письма</a></li>
                    </ul>
                </div>
                <div class="add__content">
                    <div class="lang">
                        <a href="#">RU</a>
                        <a href="#">EN</a>
                    </div>
                    <form action="#" method="post" class="form add__form__active" data-form="1">
                        <h2>Сведения об анонсе</h2>
                        <div class="form__content">
                            <label class="form__label">
                                Вступление анонса
                                <textarea></textarea>
                            </label>
                            <label class="form__label">
                                Информация о конференции
                                <textarea></textarea>
                            </label>
                            <button type="submit" class="btn">Сохранить</button>
                        </div>
                    </form>
                    <form action="#" method="post" class="form" data-form="2">
                        <h2>Важные даты</h2>
                        <div class="form__content">
                            <label class="form__label">
                                От
                                <input type="date">
                            </label>
                            <label class="form__label">
                                До
                                <input type="date">
                            </label>
                            <button type="submit" class="btn">Сохранить</button>
                        </div>
                    </form>
                    <form action="#" method="post" class="form" data-form="3">
                        <h2>Программки,информационные письма</h2>
                        <div class="form__content">
                            <label class="form__label">
                                Файл
                                <input type="file">
                            </label>
                            <label class="form__label">
                                Название
                                <textarea></textarea>
                            </label>
                            <button type="submit" class="btn">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>