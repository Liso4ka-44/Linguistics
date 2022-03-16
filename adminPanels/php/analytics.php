<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="../js/script.js" type="text/javascript"></script>
    <script src="../js/analitic.js" type="text/javascript"></script>
    <title>Аналитика</title>
</head>

<body>
    <?php
    include "navigation.php";
    ?>
    <main class="analitic__main">
        <form action="#" method="post">
            <select class="select__yers">
                <option selected>Выбирете дату</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>
        </form>

        <div class="charts">
            <div class="chart" id="piechart_3d"></div>
            <div class="chart" id="piechart_3d1"></div>
        </div>

    </main>
</body>

</html>