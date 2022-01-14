<?php
    session_start();   
    include ('connect.php');
    $nameAddRequest=htmlspecialchars($_POST["nameAddRequest"], ENT_QUOTES);
    $Time= $_POST['timeStart']."-".$_POST['timeEnd'];
    $Date=date("Y.m.d",strtotime($_POST["date"]));
    $Thesis=   htmlspecialchars($_POST["tezisRequest"], ENT_QUOTES);
    $ardicleDir="";
    if($_FILES['articleFile']['name']!=""){
        $poiskLogina = mysqli_query($connect,"SELECT `Login` FROM `requestusers` WHERE `IdRequestUsers` = $_SESSION[id]");
        $rowLogina = mysqli_fetch_assoc($poiskLogina); 
        $login = $rowLogina['Login'];
        $dir = "/users/$login/requestdoc/";
        $files = array();
        $allow = array();
        $deny = array(
            'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
            'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
            'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
        );
        $input_name = 'articleFile';
        function fileName ($extension){
            $dir = "/users/$login/requestdoc/";
            do {
                $name = md5(microtime() . rand(0, 9999));
                $chars = '.'; 
                $name = preg_replace('/['.$chars.']/', '', $name);
                $file =  $name . $extension;
            } while (file_exists($dir.$file));
            return $name;
        }
        $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
        if ($diff == 0) {
            $files = array($_FILES[$input_name]);
        } else {
            foreach($_FILES[$input_name] as $k => $l) {
                foreach($l as $i => $v) {
                    $files[$i][$k] = $v;
                }
            }		
        }	
        foreach ($files as $file) {
            $error = $success = '';
            if (!empty($file['error']) || empty($file['tmp_name'])) {
                $error = 'Не удалось загрузить файл.';
            } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
                $error = 'Не удалось загрузить файл.';
            } else {
                $name =  $file['name'];
                $parts = pathinfo($name);
                if (empty($name) || empty($parts['extension'])) {
                    $error = 'Недопустимый тип файла';
                } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                    $error = 'Недопустимый тип файла';
                } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                    $error = 'Недопустимый тип файла';
                } else {
                    $finishFile = fileName($parts['extension']);
                    $dir = "/users/$login/requestdoc/";
                    if (move_uploaded_file($file['tmp_name'], __DIR__ .$dir.$finishFile.".".$parts['extension'])) {
                        $ardicleDir = "$dir"."$finishFile".".$parts[extension]";
                        var_dump($ardicleDir);
                    } 
                }
            }
        }
    } 
    $query = "INSERT INTO `request` (`IdRequestUsers`, `Title`, `Time`, `Date`, `Thesis`, `Article`, `Status`) VALUES ('$_SESSION[id]','$nameAddRequest','$Time','$Date','$Thesis','$ardicleDir','2')";
    mysqli_query($connect, $query);
    ob_end_clean();
    if($_SESSION['status']=='admin'){
        $list='list';
        }
        else{
        $list='listus';
        }
      header("Location: $list.php");
 
?>