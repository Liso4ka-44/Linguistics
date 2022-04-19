<?php
    session_start(); 

    include "connect.php"; 
    $number = (int) $_GET['numberReq'];
    $Request = mysqli_query($connect,"SELECT `Article`, `IdRequestUsers` FROM `request` WHERE `№` = $number");
    $request = mysqli_fetch_assoc($Request); 

    if($request['IdRequestUsers'] == $_SESSION['id'] || $_SESSION['status'] =='admin'){
        $nameRequest=htmlspecialchars($_POST["NewnameRequest"], ENT_QUOTES);
        $Time= $_POST['NewtimeStart']."-".$_POST['NewtimeEnd'];
        $Date=date("Y.m.d",strtotime($_POST["Newdate"]));
        $Thesis=htmlspecialchars($_POST["NewtezisRequest"], ENT_QUOTES);
        $ardicleDir="";
        if($_FILES['NewarticleFile']['name']!=""){
            if(!empty($request['Article']) && $request['Article']!=''){
                if (file_exists(__DIR__.$request['Article'])) {
                    if(unlink($_SERVER['DOCUMENT_ROOT']."/Request/Panels$request[Article]")){
                    }
                }
            }
            $poiskLogina = mysqli_query($connect,"SELECT `Login` FROM `requestusers` WHERE `IdRequestUsers` = $_SESSION[id]");
            $rowLogina = mysqli_fetch_assoc($poiskLogina); 
            $login = $rowLogina['Login'];
            if($_SESSION['social']== true){
            $pathDirSoc = $_SESSION['socialName'];
            $sociald = (int) $_SESSION['socialId'];
            $socialdir = "/users/$pathDirSoc/$sociald/requestdoc/";
            }
            if($_SESSION['social']!= true){
                $dir = "/users/$login/requestdoc/";
            } else{
                $dir = $socialdir;
            }
            $files = array();
            $allow = array();
            $deny = array(
                'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp', 
                'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
                'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
            );
            $input_name = 'NewarticleFile';
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
                        if($_SESSION['social']!= true){
                            $dir = "/users/$login/requestdoc/";
                        } else{
                            $dir = $socialdir;
                        }
                        if (move_uploaded_file($file['tmp_name'], __DIR__ .$dir.$finishFile.".".$parts['extension'])) {
                            $ardicleDir = "$dir"."$finishFile".".$parts[extension]";
                        } 
                    }
                }
            }
        } 
        $RequestUsers = mysqli_query($connect,"UPDATE `request` SET `Title`='$nameRequest', `Time`='$Time', `Date`='$Date' , `Thesis`='$Thesis' , `Article` ='$ardicleDir' WHERE `request`.`№` = $number");
        if($_SESSION['status']=='admin'){
            $list='list';
        }
        else{
            $list='listus';
        }
        ob_end_clean();
        header("Location: $list.php");
    }
?>