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
                    <h3>Конференция 20.02.2020</h3>
                    <div class="nameKonf">
                        <div class="description editing_icon_right ">
                            <div>
                                <label class="ruText">Название <textarea></textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                            <div>
                                <label class="ruText">Концепция конференции <textarea></textarea></label>
                                <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                            </div>
                        </div>
                        <div class="anons">
                            <h3>Анонс</h3>
                            <div class="description editing_icon_right ">
                                <div>
                                    <label class="ruText">Вступление <textarea></textarea></label>
                                    <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                                <div>
                                    <label class="ruText">Информация об анонсе <textarea></textarea></label>
                                    <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="pastKonf">
                            <h3>Информация о прошедшей конференции</h3>
                            <div class="description editing_icon_right">
                                <div>
                                    <label class="ruText">Вступление <textarea></textarea></label>
                                    <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                </div>
                            </div>
                        </div>
                        <div class="speack">
                            <div class="speack__add">
                                <h3>Спикеры</h3>
                                <p class="warning">если дата не является промежутком,
                                    продублируйте её в обе формы
                                </p>
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
                                <label class="ruText">
                                    Информация о спикере
                                    <textarea></textarea>
                                </label>
                            </div>
                            <div class="speack__list">
                                <div class="speack__item">
                                    <h4>Спикер 1</h4>
                                    <div class="description">
                                        <label class="ruText">ФИО
                                            <textarea></textarea>
                                        </label>
                                    </div>
                                    <form class="imgEditing" action="" method="post" enctype="multipart/form-data">
                                        <h4>Фотография</h4>
                                        <div class="imgEditing__content">
                                            <div class="imgEditing__img">
                                                <img src="/adminPanels/orgcom/ikonnikova.jpg">
                                            </div>
                                            <div class="imgEditing__input">
                                                <input type="file" name="photo">
                                                <button type="submit">Загрузить новое фото</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="editing_icon_right">
                                        <div>
                                            <label class="ruText">Инофрмация о спикере <textarea></textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        <div>
                                            <label class="ruText">Ссылка на информацию о спикере <textarea></textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                    </div>
                                    <div class="btnDelet">
                                        <button type="submit" class="delete__btn">Удалить представителя</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="reviews">
                            <div class="review__add">
                                <h3>Отзывы</h3>
                                <p class="warning">если дата не является промежутком,
                                    продублируйте её в обе формы
                                </p>
                                <div class="description">
                                    <label class="ruText">ФИО
                                        <textarea></textarea>
                                    </label>
                                    <label class="ruText">Должность
                                        <textarea></textarea>
                                    </label>
                                </div>
                                <label class="ruText">
                                    Текст отзыва
                                    <textarea></textarea>
                                </label>
                                <button type="submit" class="btn">Добавить отзыв</button>
                            </div>
                            <div class="review__list">
                                <div class="review__item">
                                    <h4>Отзыв 1</h4>
                                    <div class="editing_icon_right">
                                        <div>
                                            <label class="ruText">ФИО <textarea></textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        <div>
                                            <label class="ruText">Должность <textarea></textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                        <div>
                                            <label class="ruText">Текст отзыва <textarea></textarea></label>
                                            <button type="submit"><img src="../img/icon/update.svg" alt=""></button>
                                        </div>
                                    </div>
                                    <div class="btnDelet">
                                        <button type="submit" class="delete__btn">Удалить отзыв</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>