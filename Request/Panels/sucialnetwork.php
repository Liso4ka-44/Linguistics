<?php

  session_start();
  $connect = mysqli_connect("localhost","suitolog_moscow","Dagestan1234","suitolog_moscow");
  function logins($social){ 
    $symbols = "QWERTYUIPASDFGHJKZXCVBNM"."qwertyuipasdfghjkzxcvbnm"."12345689";
    while($i<7) { 
      $word .= $symbols[mt_rand(0, strlen($symbols)-4)];
      $i++; 
    }
    return $social."_".$word; 
  }
  function pass(){ 
    $symbols = "QWERTYUIPASDFGHJKZXCVBNM"."qwertyuipasdfghjkzxcvbnm"."12345689";
    while($i<=7) { 
      $word .= $symbols[mt_rand(0, strlen($symbols)-4)];
      $i++; 
    }
    return $word; 
  }
    if($_GET['state']=='yandex'){
        $params = array(
            'grant_type'    => 'authorization_code',
            'code'          => $_GET['code'],
            'client_id'     => 'bdea20a38ad74802a08a158e92fbc589',
            'client_secret' => 'a1edd6ff5d9346bc9fada25add1b41ff',
        );
        $ch = curl_init('https://oauth.yandex.ru/token');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $data = curl_exec($ch);
        curl_close($ch);	       
        $data = json_decode($data, true);
        if (!empty($data['access_token'])) {
            // Токен получили, получаем данные пользователя.
            $ch = curl_init('https://login.yandex.ru/info');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, array('format' => 'json')); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $data['access_token']));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $info = curl_exec($ch);
            curl_close($ch);
            $info = json_decode($info, true);
        }
    }
    if($_GET['state']=='facebook'){
        $params = array(
	    	'client_id'     => '3152308481762989',
	    	'client_secret' => '346dda2bf473b4b89fbee4d5110df730',
	    	'redirect_uri'  => 'https://tomimoscow.ru/sucialnetwork.php',
	    	'code'          => $_GET['code']
	    );
	    // Получение access_token
	    $data = file_get_contents('https://graph.facebook.com/oauth/access_token?' . urldecode(http_build_query($params)));
	    $data = json_decode($data, true);
	    if (!empty($data['access_token'])) {
	    	$params = array(
	    		'access_token' => $data['access_token'],
	    		'fields'       => 'id,email,first_name,last_name,picture'
	    	);
	    	// Получение данных пользователя
	    	$info = file_get_contents('https://graph.facebook.com/me?' . urldecode(http_build_query($params)));
	    	$info = json_decode($info, true);
	    }
    }
    if($_GET['state']=='vk'){
        $params = array(
            'client_id'     => '7998726',
            'client_secret' => 'yR0hR4WwFDYDjQXOr41f',
            'redirect_uri' => 'http://tomimoscow.ru/sucialnetwork.php',
            'code' => $_GET['code']
        );	
        // Получение access_token
	    $data = file_get_contents('https://oauth.vk.com/access_token?' . urldecode(http_build_query($params)));
	    $data = json_decode($data, true);
	    if (!empty($data['access_token'])) {
	    	// Получили email
	    	$email = $data['email']; 
	    	// Получим данные пользователя
	    	$params = array(
	    		'v'            => '5.81',
	    		'uids'         => $data['user_id'],
	    		'access_token' => $data['access_token'],
	    		'fields'       => 'photo_big',
	    	);
	    	$info = file_get_contents('https://api.vk.com/method/users.get?' . urldecode(http_build_query($params)));
	    	$info = json_decode($info, true);	
	    }
    }
    else
    {
        ob_end_clean();
        header('Location: http://tomimoscow.ru/index.php');
    }
    if($_GET['state']=='yandex' && !empty($info)){
        $id =(int) $info['id'];
        $first_name = $info['first_name'];
        $last_name = $info['last_name'];
        $default_email = $info['default_email'];
        $rezult = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `requestusers` WHERE `IdUserNetwork` =$id AND `IdSocialList`=3 "));
        $path = __DIR__ . "/Panels/users/yandex/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $path = __DIR__ . "/Panels/users/yandex/$id/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $path = __DIR__ . "/Panels/users/yandex/$id/foto/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $path = __DIR__ . "/Panels/users/yandex/$id/requestdoc/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        if ($rezult !=[]){
            $_SESSION['aut'] = true;
            $_SESSION['socialId']=$id;
            $_SESSION['id'] = $rezult['IdRequestUsers'];
            $_SESSION['status'] = $rezult['status'];
            $_SESSION['social']= true; 
            $_SESSION['socialName']='yandex' ;
            ob_end_clean();
            header('Location: http://tomimoscow.ru/index.php');
        }else{
            if($info['is_avatar_empty']!=true){
                $default_avatar_id = "https://avatars.yandex.net/get-yapic/$info[default_avatar_id]/islands-200";
            }
            $sok ='yandex';
            $Login= logins($sok);
            $Password= pass();
            $Password = password_hash($Password, PASSWORD_BCRYPT);
            $sql="INSERT INTO `requestusers`
            ( `IdUserNetwork`, `IdSocialList`, `Login`, `Password`, `email`, `Name`, `Surname`,  `Photo`, `Status`) 
            VALUES 
            ($id,3,'$Login','$Password','$default_email','$first_name','$last_name','$default_avatar_id','user')";
            $poisk = mysqli_query($connect, $sql);
            $query = "SELECT `IdRequestUsers` FROM `requestusers` WHERE `IdUserNetwork` = $id";
            $rezult = mysqli_fetch_assoc(mysqli_query($connect, $query));
            $lastid = (int) $rezult["IdRequestUsers"];
            $_SESSION['id'] = $lastid;
            $_SESSION['socialId']=$id;
            $_SESSION['aut'] = true;

            $_SESSION['status'] = 'user';
            $_SESSION['social']= true;
            $_SESSION['socialName']='yandex';
            ob_end_clean();
            header('Location: http://tomimoscow.ru/index.php');
      }
    }
    if($_GET['state']=='facebook' && !empty($info)){
        $id =(int) $info['id'];
        $default_email = $info['email'];
        $rezult = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `requestusers` WHERE `IdUserNetwork` = $id AND `IdSocialList`=4"));
        $path = __DIR__ . "/Panels/users/facebook/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $path = __DIR__ . "/Panels/users/facebook/$id/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $path = __DIR__ . "/Panels/users/facebook/$id/foto/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $path = __DIR__ . "/Panels/users/facebook/$id/requestdoc/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        if ($rezult != []){
            $_SESSION['aut'] = true;
            $_SESSION['socialId']=$id;
            $_SESSION['id'] = $rezult['IdRequestUsers'];
            $_SESSION['status'] = $rezult['status'];
            $_SESSION['social']= true;
            $_SESSION['socialName']='facebook' ;
            ob_end_clean();
            header('Location: http://tomimoscow.ru/index.php');
        }else{
            $default_avatar_id = $info['first_name']['data']['url'];
            $sok ='facebook';
            $Login= logins($sok);
            $Password= pass();
            $Password = password_hash($Password, PASSWORD_BCRYPT);
            $sql="INSERT INTO `requestusers`
            ( `IdUserNetwork`, `IdSocialList`, `Login`, `Password`, `email`, `Name`, `Surname`,  `Photo`, `Status`) 
            VALUES 
            ($id,4,'$Login','$Password','$default_email','$info[first_name]','$info[last_name]','$default_avatar_id','user')";
            $poisk = mysqli_query($connect, $sql);
            $query = "SELECT `IdRequestUsers` FROM `requestusers` WHERE `IdUserNetwork` = $id";
            $rezult = mysqli_fetch_assoc(mysqli_query($connect, $query));
            $lastid = (int) $rezult["IdRequestUsers"];
            $_SESSION['id'] = $lastid;
            $_SESSION['socialId']=$id;
            $_SESSION['aut'] = true;
            $_SESSION['status'] = 'user';
            $_SESSION['social']= true;
            $_SESSION['socialName']='facebook' ;
            ob_end_clean();
            header('Location: http://tomimoscow.ru/index.php');
      }
    }
    if($_GET['state']=='vk' && !empty($info)){
        $id =(int) $info['response'][0]['id'];
        $first_name = $info['response'][0]['first_name'];
        $last_name = $info['response'][0]['last_name'];
        $rezult = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `requestusers` WHERE `IdUserNetwork` = $id AND `IdSocialList`=2 "));
        $path = __DIR__ . "/Panels/users/vk/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $path = __DIR__ . "/Panels/users/vk/$id/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $path = __DIR__ . "/Panels/users/vk/$id/foto/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $path = __DIR__ . "/Panels/users/vk/$id/requestdoc/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        if ($rezult !=[]){
            $_SESSION['aut'] = true;
            $_SESSION['socialId']=$id;
            $_SESSION['id'] = $rezult['IdRequestUsers'];
            $_SESSION['status'] = $rezult['status'];
            $_SESSION['social']= true;
            $_SESSION['socialName']='vk';
           
            ob_end_clean();
            header('Location: http://tomimoscow.ru/index.php');
        }else{
            $default_avatar_id = $info['response'][0]['photo_big'];
            $sok ='vk';
            $Login= logins($sok);
            $Password=pass();
            $Password = password_hash($Password, PASSWORD_BCRYPT);
            $sql="INSERT INTO `requestusers`
            ( `IdUserNetwork`, `IdSocialList`, `Login`, `Password`, `email`, `Name`, `Surname`,  `Photo`, `Status`) 
            VALUES 
            ($id,2,'$Login','$Password','$default_email','$first_name','$last_name','$default_avatar_id','user')";
            $poisk = mysqli_query($connect, $sql);
            $query = "SELECT `IdRequestUsers` FROM `requestusers` WHERE `IdUserNetwork` = $id";
            $rezult = mysqli_fetch_assoc(mysqli_query($connect, $query));
            $lastid = (int) $rezult["IdRequestUsers"];
            $_SESSION['id'] = $lastid;
            $_SESSION['socialId']=$id;
            $_SESSION['aut'] = true;
            $_SESSION['status'] = 'user';
            $_SESSION['social']= true;
            $_SESSION['socialName']='vk' ;
            ob_end_clean();
            header('Location: http://tomimoscow.ru/index.php');
        }
    }
    ob_end_clean();
    header('Location: http://tomimoscow.ru/index.php');
?>