<?php
    include 'connect.php';
    $login = $_POST['login'];
    var_dump($_POST);
    $rezult = mysqli_fetch_assoc(mysqli_query($connect, "SELECT  `Login` FROM `requestusers` WHERE `Login` = '$login'"));
    if ($rezult !=[]){
        exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
    if($_POST['login'] == "" || $_POST['password'] == ""){
   //    exit("Извините,данные не могут быть пустыми");
    }
    if($_POST['login'] != $_POST['password']){
        $login = htmlspecialchars(preg_replace('/\s+/', '',$_POST['login']));
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars(preg_replace('/\s+/', '',$_POST['password']));
        $password = password_hash($password, PASSWORD_BCRYPT);
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $path = __DIR__ . "/users/$login/";
        $about =  htmlspecialchars($_POST['about']);
        $Patronymic =   htmlspecialchars($_POST['Patronymic']);
		if (!is_dir($path)) {
			mkdir($path, 0777, true);
		}
        $path = __DIR__ . "/users/$login/foto/";
		if (!is_dir($path)) {
			mkdir($path, 0777, true);
		}
        if($_FILES['Foto']['name']!=""){
            function translitText($str){
                $tr = array(
                    "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
                    "Д"=>"D","Е"=>"E","Ё"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
                    "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
                    "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
                    "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
                    "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
                    "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
                    "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"e","ж"=>"j",
                    "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
                    "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
                    "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
                    "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
                    "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
                );
                return strtr($str,$tr);
            }
            if($_FILES['Foto']['name']!=''){
                $file_name = $_FILES['Foto']['name'];
                $file_name = translitText($file_name);
                $file_tmp = $_FILES['Foto']['tmp_name'];
                move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/Panels/users/$login/foto/$file_name");
                $dir = "/users/$login/foto/$file_name";
            }
        }
        else{
            $dir="";
        }
        $path = __DIR__ . "/users/$login/requestdoc/";
		if (!is_dir($path)) {
			mkdir($path, 0777, true);
		}
        $query = "INSERT INTO `requestusers`( `Login`, `Password`, `email`, `Name`, `Surname`, `Patronymic`, `Photo`, `about`, `Status`) VALUES ('$login','$password','$email','$firstname','$lastname','$Patronymic','$dir','$about','user')";
        $poisk = mysqli_query($connect, $query);
        if ($poisk=='TRUE'){
            echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.";
            ob_end_clean();
            header('Location: ../index.php');
        }else{
            echo "Ошибка!";
        }
    }
    else {
        exit ("Извините, возникала ошибка, вернитесь обратно");
    }
    ?>
