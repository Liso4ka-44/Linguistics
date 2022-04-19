<?php
  include "connect.php";
  if(!empty($_SESSION['social'])){
    $AccountMenu = mysqli_query($connect,"SELECT `email`, `Name`, `Surname`, `Patronymic`,`email`, `Photo`, `about`, `Status`  FROM `requestusers` WHERE `IdUserNetwork` = $_SESSION[socialId]");
  }
  else{
    $AccountMenu = mysqli_query($connect,"SELECT `email`, `Name`, `Surname`, `Patronymic`,`email`, `Photo`, `about`, `Status`  FROM `requestusers` WHERE `IdRequestUsers` = $_SESSION[id]");
  }
    $row = mysqli_fetch_assoc($AccountMenu); 
    $name =$row["Name"]." ".$row["Surname"];
    if($row["Photo"]!="" && empty($_SESSION['social'])){
      $explode = explode('/', $row["Photo"],2);
     $avatar =  $explode[1];
    }
    if($_SESSION['social']==true){
      $avatar = $row["Photo"];
    }
    if($avatar==''){
      $avatar = "../assets/img/placeholder.png";
    }

  if($_SESSION['status']=='admin'){
    $list='list';
  }else{
   $list='listus';
  }
?>
<div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/2.jpg">
    <div class="logo">
        <a href="" class="simple-text logo-mini">MC</a>
        <a href="" class="simple-text logo-normal">MGIMO CONFERENCE</a>
    </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <img src="<?=$avatar?>" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                <?=$name?>
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="prof.php">
                    <span class="sidebar-normal"> МОЙ ПРОФИЛЬ </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <?php if($_SESSION['status']=='admin'):?>
          <li class="nav-item ">
            <a class="nav-link" href="dash.php">
              <i class="material-icons">timeline</i>
              <p> Аналитика </p>
            </a>
          </li>
          <?php endif;?>
          <li class="nav-item ">
            <a class="nav-link"  href="<?=$list?>.php">
            <i class="material-icons">content_paste</i>
              <p>Заявки</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link"  href="calendar.php">
            <i class="material-icons">date_range</i>
              <p> Каллендарь</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="exit.php">
              <i class="material-icons">exit_to_app</i>
              <p>Выход</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    