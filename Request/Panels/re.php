<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';
    $connect = mysqli_connect("localhost","suitolog_moscow","Dagestan123","suitolog_moscow");
    //$connect = mysqli_connect("localhost","root","","mgimo");
    $login = $_POST['login'];
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
        $email2 = $_POST['email'];
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
        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';
        // Настройки SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0;
        $mail->Host = 'ssl://smtp.yandex.ru';
        $mail->Port = 465;
        $mail->Username = 'suitolog@yandex.ru';
        $mail->Password = 'Suitolog_odi-123';
        // От кого
        $mail->setFrom('suitolog@yandex.com', 'MGIMO REQUEST');		
        // Кому
        $mail->addAddress($email2, $firstname.' '.$lastname );
        // Тема письма
        $mail->Subject = 'Регистрация на сайте ';
        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="initial-scale=1.0"/>
        <meta name="format-detection" content="telephone=no"/>
            <title>MGIMO REQUEST</title>
        <style type="text/css">
    
        html,body {
            background-color:#fff;
            margin:0;
            padding:0
        }
        html {
            width:100%
        }
        body {
            margin:0;
            padding:0;
            -webkit-text-size-adjust:none;
            -ms-text-size-adjust:none
        }
        table {
            border-spacing:0;
            border-collapse:collapse
        }
        table td {
            border-collapse:collapse
        }
        table tr {
            border-collapse:collapse
        }
        img {
            display:block!important
        }
        br,strong br,b br,em br,i br {
            line-height:100%
        }
        a {
            text-decoration:none
        }
        .button a {
            font-size:14px;
            font-family:'.'Lato.'.',sans-serif;
            color:#fff;
            font-weight:300;
            background:transparent
        }
        @media only screen and (max-width: 640px) {
        body {
            width:auto!important
        }
        table[class="col1"] {
            width:29%;
        }
        table[class="col2"] {
            width:47%;
            text-align:left
        }
        table[class="col3_one"] {
            width:64%;
            text-align:left;
        }
        table[class="col3"] {
            width:100%;
            text-align:center;
        
        }
        table[class="col-600"] {
            width:450px
        }
        table[class="insider"] {
            width:90%
        }
        img[class="images_style"] {
            width:60%;
            height:auto
        }
        .margin{
            margin-left: 25px;
            margin-right: 25px;
        }
        }
        @media only screen and (max-width: 480px) {
        body {
            width:auto!important
        }
        table[class="col1"] {
            width:100%;
        }
        table[class="col2"] {
            width:100%;
            text-align:left
        }
        table[class="col3"] {
            width:100%;
            text-align:center
        }
        table[class="col3_one"] {
            width:80%;
            text-align:center;
            margin: 0 20px 0 0;
        }
        table[class="col-600"] {
            width:290px
        }
        table[class="insider"] {
            width:82%!important
        }
        img[class="images-style"] {
            width:60%
        }
        .button { width: 40%; display: block; }
        a.read-more { text-align: center; display: block;}
        }
        /* OUTLOOK CLASS*/
        .ExternalClass {
            background-color:#fff;
            width:100%
        }
        .ExternalClass,.ExternalClass font,.ExternalClass td,.ExternalClass p,.ExternalClass span,.ExternalClass div {
            line-height:100%
        }
        .ReadMsgBody {
            width:100%;
            background-color:#fff
        }
        /* YAHOO MAIL CLASS */
        .yshortcuts,.yshortcuts a,.yshortcuts a:link,.yshortcuts a:visited,.yshortcuts a:hover,.yshortcuts a span {
            border-bottom:none!important
        }
        /* MAILCHIMP CLASS */
        .default-edit-image {
            height:20px
        }
        </style>
        <meta name="robots" content="noindex,follow" />
        </head>
        <body>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center"  valign="top" background="http://suitamoscow.ru/Request/assets/images/2.jpg" bgcolor="#66809b" style="background-size:cover; background-position:top;height="400"">
                                    <table class="col-600" width="600" height="300" border="0" align="center" cellpadding="0" cellspacing="0" background="http://suitamoscow.ru/Request/assets/images/bg.png">
                                        <tr>
                                            <td height="40"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="line-height: 0px;">
                                                <img style="display:block; line-height:0px; font-size:0px; border:0px;" src="http://suitamoscow.ru/Request/assets/images/logo.png" width="109" height="103" alt="logo" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="font-family:  sans-serif; font-size:37px; color:#ffffff; line-height:24px; font-weight: bold; letter-spacing: 7px;">
                                                MGIMO REQUEST <span style="font-family:  sans-serif; font-size:37px; color:#ffffff; line-height:39px; font-weight: 300; letter-spacing: 7px;"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td  height="100">	
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:20px; margin-right:20px;">
                <tr>
                    <td align="center">
                        <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                            <tr>
                                <td height="50"></td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <table class="col2" width="287" border="0" align="right" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="center" style="line-height:0px;">
                                                <img style="display:block; line-height:0px; font-size:0px; border:0px;" class="images_style" src="http://suitamoscow.ru/Request/assets/images/icon-responsive.png" width="150" height="138" />
                                            </td>
                                        </tr>
                                    </table>
                                    <table width="287" border="0" align="left" cellpadding="0" cellspacing="0" class="col2" style="">
                                        <tr>
                                            <td align="center">
                                                <table class="insider" width="237" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr align="left">
                                                        <td style="font-family:   sans-serif; font-size:23px; color:#2a3b4c; line-height:30px; font-weight: bold;"> '.$firstname.', спасибо за регистрацию!</td>
                                                    </tr>
        
                                                    <tr>
                                                        <td height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-family:  sans-serif; font-size:14px; color:#7f8c8d; line-height:24px; font-weight: 300;">
                                                            Данные от аккаунта.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-family:  sans-serif; font-size:14px; color:#7f8c8d; line-height:24px; font-weight: 600;">
                                                            <strong>Логин</strong> : '.$login.'
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-family:  sans-serif; font-size:14px; color:#7f8c8d; line-height:24px; font-weight: 600;">
                                                            <strong>Пароль</strong> : '.$_POST["password"].'
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                            <tr>
                                <td height="50"></td>
                            </tr>
                            <tr>
                                <td align="center" bgcolor="#fff" background="http://suitamoscow.ru/Request/assets/images/2.jpg"  height="185" >
                                    <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" >
                                        <tr>
                                            <td height="25"></td>
                                        </tr>
        
                                            <tr>
                                            <td align="center" style="font-family:   sans-serif; font-size:26px; font-weight: 500; color:#fff;">Мы в социальных сетях</td>
                                            </tr>
                                        <tr>
                                            <td height="25"></td>
                                        </tr>
                                        <table align="center" width="35%" border="0" cellspacing="0" cellpadding="0" >
                                        <tr>
                                            <td align="center" width="30%" style="vertical-align: top;padding-right: 10px;">
                                                    <a href="https://plus.google.com/+Designmodo/posts" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/instagram.png"> </a>
                                            </td>
                                            <td align="center" width="30%" style="vertical-align: top;padding-right: 10px;">
                                                <a href="https://plus.google.com/+Designmodo/posts" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/twitter.png"> </a>
                                        </td>
                                        <td align="center" width="30%" style="vertical-align: top;padding-right: 10px;">
                                            <a href="https://plus.google.com/+Designmodo/posts" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/vk.png"> </a>
                                        </td>
                                        <td align="center" width="30%" style="vertical-align: top;padding-right: 10px;">
                                            <a href="https://plus.google.com/+Designmodo/posts" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/youtube.png"> </a>
                                        </td>
                                        <td align="center" width="30%" style="vertical-align: top; ">
                                            <a href="https://plus.google.com/+Designmodo/posts" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/facebook.png"> </a>
                                        </td>
                                        </tr>
                                        </table>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </td>
            </tr>
            </table>
        </body>
        </html>';
        $mail->msgHTML($body);
        $query = "INSERT INTO `requestusers`(`IdSocialList`, `Login`, `Password`, `email`, `Name`, `Surname`, `Patronymic`, `Photo`, `about`, `Status`) VALUES (1,'$login','$password','$email','$firstname','$lastname','$Patronymic','$dir','$about','user')";
        $poisk = mysqli_query($connect, $query);
        if ($poisk=='TRUE'){
            $mail->send();
            ob_end_clean();
           header('Location: ../index.php');
        }else{
            echo "Ошибка!";
            ob_end_clean();
            header('Location: ../index.php');
        }
    }
    else {
        exit ("Извините, возникала ошибка, вернитесь обратно");
    }
    ?>
