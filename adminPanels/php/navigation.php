<?php
include "connect.php";
if (isset($_POST["exit"])) {
    session_destroy();
    echo "<script>window.location = '../index.php';</script>";
}
?>

<header class="header">
    <div class="container">
        <div class="header__body">
            <div class="header__nav">
                <ul class="header__list">
                    <li class="header__item"><a href="/adminPanels/php/add.php" date-nav="1" class="header__link active">Добавление</a></li>
                    <li class="header__item"><a href="/adminPanels/php/editing.php" date-nav="2" class="header__link">Редактирование</a></li>
                    <li class="header__item"><a href="/adminPanels/php/orgcom.php" date-nav="3" class="header__link">Оргкомитет</a></li>
                    <li class="header__item"><a href="/adminPanels/php/newuser.php" date-nav="4" class="header__link">Добавление пользователей</a></li>
                    <li class="header__item"><a href="#" date-nav="5" class="header__link">Аналитика</a></li>
                    <hr>
                </ul>
                <form method="post" class="exit">
                    <button class="exit__btn" type="submit" name="exit">Выйти</button>
                </form>

            </div>
            <div class="header__breadCrumbs">
            </div>
        </div>
    </div>
</header>