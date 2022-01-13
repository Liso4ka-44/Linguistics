<?php

include('connect.php');

			$result = mysqli_query($connect, "DELETE FROM `conferences` WHERE `ID_conf` = $_GET[id]");
            header('Location: conflist.php');
?>