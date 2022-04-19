<?php
    include 'connect.php';  
    if( $_SESSION['aut'] == true && !empty($_SESSION['id'])){
        if($_GET['rd']=='ft'){
            if($_FILES['NewFoto']['name']!=""){
                if($_SESSION['social']== true){
                    $pathDirSoc = $_SESSION['socialName'];
                    $sociald = (int) $_SESSION['socialId'];
                    $socialdir = "/users/$pathDirSoc/$sociald/foto/";
                }
                $poiskLogina = mysqli_query($connect,"SELECT `Login`,`Photo` FROM `requestusers` WHERE `IdRequestUsers` = $_SESSION[id]");
                $rowLogina = mysqli_fetch_assoc($poiskLogina); 
                $login = $rowLogina['Login'];
                if(!empty($request['Photo']) && $request['Photo']!=''){
                    if (file_exists(__DIR__.$request['Photo'])) {
                        if(unlink($_SERVER['DOCUMENT_ROOT']."/Request/Panels$request[Photo]")){
                            echo 'файл удален';
                        }
                    }
                }
                if($_SESSION['social']!= true){
                    $dir = "/users/$login/foto/";
                } else{
                    $dir = $socialdir;
                }
                $files = array();
                $allow = array(
                    'jpg', 'png', 'svg', 'jpeg'
                );
                $deny = array(
                    'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7','txt','doc','pptx','mp','mp3',
                    'mp4', 'phps', 'cgi', 'pl', 'asp', 'html', 
                    'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html', 
                    'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
                );
                $input_name = 'NewFoto';
                
                function fileName ($extension){
                    if($_SESSION['social']!= true){
                        $dir = "/users/$login/foto/";
                       } else{
                           $dir = $socialdir;
                       }
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
                        } elseif (!empty($allow) && in_array(strtolower($parts['extension']), $allow)) {
                            $finishFile = fileName($parts['extension']);
                            if(      $_SESSION['social']== true){
                                $pathDirSoc = $_SESSION['socialName'];
                                $sociald = (int) $_SESSION['socialId'];
                                $socialdir = "/users/$pathDirSoc/$sociald/foto/";
                                $dir = $socialdir;
                                }
                            if (move_uploaded_file($file['tmp_name'], __DIR__ .$dir.$finishFile.".".$parts['extension'])) {
                                if($_SESSION['social']== true){
                                    if(      $_SESSION['social']== true){
                                        $pathDirSoc = $_SESSION['socialName'];
                                        $sociald = (int) $_SESSION['socialId'];
                                        $socialdir = "/users/$pathDirSoc/$sociald/foto/";
                                        }
                                    $pathDirSoc = $_SESSION['socialName'];
                                    $sociald = (int) $_SESSION['socialId'];
                                    $socialdir = "users/$pathDirSoc/$sociald/foto/";
                                }
                                if($_SESSION['social']!= true){
                                    $dir = "users/$login/foto/";
                                } else{
                                       $dir = $socialdir;
                                }
                                $ardicleDir = "users/$dir"."$finishFile".".$parts[extension]";
                                $query = 
                                "UPDATE `requestusers` 
                                    SET 
                                        `Photo`='$ardicleDir'
                                    WHERE 
                                `requestusers`.`IdRequestUsers`  = $_SESSION[id]";
                                $poisk = mysqli_query($connect, $query);
                            } 
                        }
                    }
                }
            } 
        }
        if($_GET['rd']=='ps'){
            $password = $_POST['NewPass0nForAcc'];
            $password = htmlspecialchars(preg_replace('/\s+/','',$_POST['NewPass0nForAcc']));
            $password = password_hash($password, PASSWORD_BCRYPT);
            $query = 
            "UPDATE `requestusers` 
                SET 
                    `Password`='$password'
             WHERE 
             `requestusers`.`IdRequestUsers`  = $_SESSION[id]";
            $poisk = mysqli_query($connect, $query);
            
        }
        if($_GET['rd']=='os'){
            $email = htmlspecialchars($_POST['email']);
            $firstname = htmlspecialchars($_POST['Name']);
            $lastname = htmlspecialchars($_POST['Surname']);
            $about =  htmlspecialchars($_POST['about']);
            $Patronymic =   htmlspecialchars($_POST['Patronymic']);
            $query = 
            "UPDATE `requestusers` 
                SET 
                    `email`='$email',
                    `Name`='$firstname ',
                    `Surname`='$lastname',
                    `Patronymic`='$Patronymic',
                    `about`='$about'
             WHERE 
             `requestusers`.`IdRequestUsers`  = $_SESSION[id]";
            $poisk = mysqli_query($connect, $query);
        }
    }
        ob_end_clean();
        header('Location: prof.php');

?>