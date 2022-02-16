<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js" type="text/javascript"></script>
    <script src="../js/editing.js" type="text/javascript"></script>
    <title>Редактирование</title>
</head>

<body>
    <?php
    include "navigation.php";
    ?>
    <main>
        <div class="main__body">
            <div class="konfList">
                <h2>Список конференций</h2>

                <?php
                include('connect.php');
                $count = 0;
                $poisk = mysqli_query($connect, "SELECT `ID_conf`, `date_from` FROM `dates` WHERE `text_ru` LIKE 'Конференция%' ORDER BY `date_from` DESC");
                while (($row = mysqli_fetch_assoc($poisk)) != false) {

                    $id = (int) $row['ID_conf'];
                    $date = date("d.m.Y", strtotime($row['date_from']));
                    echo
                    '<div class="konf">
                        <div class="konf__title">
                            <p>Дата конференции' . ' ' . $date . '</p>
                            <img src="../img/icon/Vector 3.png" alt="" class="slide" data-item = "' . $count . '">
                        </div>
                           <div class="konf__footer" data-item = "' . $count . '">
                            <div class="konf__lang">
                                <p>Выберите язык редактирования:</p>
                                <div class="">
                                    <a href="#" class="enText">RU</a>
                                    <a href="#" class="ruText">EN</a>
                                </div>
                            </div>
                            <div class="konf__action">
                                <a href="#" class="konf__editing">Редактировать общую информацию</a>
                                <a href="#" class="konf__delet">Удалить конференцию</a>
                            </div>
                        </div> 
                    </div>';
                    $count++;
                }
                ?>

            </div>
        </div>
    </main>
</body>

</html>