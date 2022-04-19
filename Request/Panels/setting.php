<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    include "regprov.php";
    include "connect.php"; 
    require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 0;
    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->Port = 465;
    $mail->Username = 'suitolog@yandex.ru';
    $mail->Password = 'Suitolog_odi-123';
    // От кого
    $mail->setFrom('suitolog@yandex.com', 'MGIMO REQUEST');		
    $mail->Subject = 'Изменение статуса заявки ';
    $newStatusRequest=false;
    if($_SESSION['status'] == 'admin' && $_GET['re']=='nS'){
        if(!empty($_GET['numberS']) && !empty($_GET['select'])){
            $status = (int) $_GET['select'];
            $numberRequest = (int) $_GET['numberS'];

            $Request = mysqli_query($connect,"SELECT  `IdRequestUsers` FROM `request` WHERE `№` = $numberRequest");
            $request = mysqli_fetch_assoc($Request);

            $number = (int)  $request['IdRequestUsers'];


            $Request = mysqli_query($connect,"SELECT  `email`, `Name`, `Surname`  FROM `requestusers` WHERE `IdRequestUsers` = $number");
            $request = mysqli_fetch_assoc($Request);


            $firstname = $request['Name'];
            $lastname = $request['Surname'];
            $email = $request['email'];
            $newStatusRequest=true;
            switch ($status) {
                case 1 :
                    $color='red';
                  $case = "Откланено";
                  break;
                case 3 :
                  $case = "Одобрено";
                  $color='blue';
                  break;
              }
              $textMEss="Статус вашей заявки №$numberRequest изменен на <span style='font-weight: bold; color:$color;'>$case</span>";
            $sql ="UPDATE `request` SET `Status` = $status WHERE `request`.`№` = $numberRequest ";
            mysqli_query($connect,$sql);
        }
    }
    if($_GET['re'] == 'dR'){
        $number = (int) $_GET['numberReq'];
        if($request['IdRequestUsers'] == $_SESSION['id'] || $_SESSION['status'] =='admin'){
            $Request = mysqli_query($connect,"SELECT  `email`, `Name`, `Surname`  FROM `requestusers` WHERE `IdRequestUsers` = $number");
            $request = mysqli_fetch_assoc($Request); 
            $firstname = $request['Name'];
            $lastname = $request['Surname'];
            $email = $request['email'];
            $newStatusRequest=true;
            if(!empty($request['Article']) && $request['Article']!=''){
                if (file_exists(__DIR__.$request['Article'])) {
                    if(unlink($_SERVER['DOCUMENT_ROOT']."/Request/Panels$request[Article]")){
                        echo 'файл удален';
                    }
                }
            }
            $textMEss="Ваша заявка №$number удалена";
            $RequestUsers = mysqli_query($connect,"DELETE FROM `request` WHERE `№` = $number");
        }
    }
    $mail->addAddress($email, $firstname.' '.$lastname );
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
                                                    <td style="font-family:   sans-serif; font-size:23px; color:#2a3b4c; line-height:30px; font-weight: bold;"> '.$firstname.' '.$lastname.'!</td>
                                                </tr>
    
                                                <tr>
                                                    <td height="5"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:  sans-serif; font-size:14px; color:#7f8c8d; line-height:24px; font-weight: 600;">
                                                    '.$textMEss.'
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
                                                <a href="https://www.instagram.com/mgimo_linguistics/" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/instagram.png"> </a>
                                        </td>
                                        <td align="center" width="30%" style="vertical-align: top;padding-right: 10px;">
                                            <a href="https://t.me/mgimo_linguistics" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/twitter.png"> </a>
                                    </td>
                                    <td align="center" width="30%" style="vertical-align: top;padding-right: 10px;">
                                        <a href="https://vk.com/club158020783" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/vk.png"> </a>
                                    </td>
                                    <td align="center" width="30%" style="vertical-align: top;padding-right: 10px;">
                                        <a href="https://www.youtube.com/channel/UCPb1uH_-PfDek56fvhm505A" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/youtube.png"> </a>
                                    </td>
                                    <td align="center" width="30%" style="vertical-align: top; ">
                                        <a href="https://www.facebook.com/LinguisticsatMGIMO/" target="_blank"> <img src="http://suitamoscow.ru/Request/assets/images/facebook.png"> </a>
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
    $mail->send();
    ob_end_clean();
    header('Location: ../index.php');
?>


    
