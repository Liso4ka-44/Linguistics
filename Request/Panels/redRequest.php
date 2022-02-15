<?php
    session_start();  
    include "connect.php";
    $number = (int) $_GET['number'];
    $listRequest = mysqli_query($connect,"SELECT * FROM `request` WHERE `№` = $number ");
    $row3 = mysqli_fetch_assoc($listRequest);
    $date =date("Y-m-d",strtotime($row3['Date']));
    $time = explode('-', $row3["Time"], 3);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <link rel="icon" sizes="76x76" type="image/png" href="../assets/img/logo.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Заявки</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>
<body>
  <div class="wrapper">
  <?php include("navPanels.php");?>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
      <div class="content">
        <div class="col-md-12">
          <div class="card ">
             <div class="card-header card-header-rose card-header-text">
              <div class="card-text">
                <h4 class="card-title">Заявка №<?=$row3["№"]?></h4>
              </div>
            </div>
            <div class="card-body ">
                <form method="POST" action="upRequest.php?numberReq=<?=$row3["№"]?>" enctype="multipart/form-data" class="form-horizontal">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Название</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <input type="text"  required  name = "NewnameRequest" class="form-control" value="<?=$row3['Title']?>">
                        <span class="bmd-help">Название вашего выступления</span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Тезис</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <textarea type="text"  required  name="NewtezisRequest" class="form-control" ><?=$row3['Thesis']?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Ваша почта</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                          <input type="text" name="email" class="form-control" value="<?=$row['email']?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">От</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                          <input type="text" class="form-control" name="nameSpeakerRequest" value="<?=$row['Name']." ".$row['Surname']?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Статья</label>
                    <div class="col-sm-10">
                      <input type="file" name="NewarticleFile">
                    </div>
                  </div>
                  <div class="row">
                  <label class="col-sm-2 col-form-label">Выберите время</label>
                    <div class="col-md-3">
                      <div class="card ">
                        <div class="card-header card-header-rose card-header-text">
                          <div class="card-icon">
                            <i class="material-icons">today</i>
                          </div>
                          <h4 class="card-title">Дата</h4>
                        </div>
                        <div class="card-body ">
                          <div class="form-group">
                            <input type="date" name="Newdate"  required  class="form-control" value="<?=$date?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card ">
                        <div class="card-header card-header-rose card-header-text">
                          <div class="card-icon">
                            <i class="material-icons">av_timer</i>
                          </div>
                          <h4 class="card-title">Время начала</h4>
                        </div>
                        <div class="card-body ">
                          <div class="form-group">
                            <input type="text"  name="NewtimeStart" class="form-control timepicker" required value="<?=$time[0]?>">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card ">
                        <div class="card-header card-header-rose card-header-text">
                          <div class="card-icon">
                            <i class="material-icons">av_timer</i>
                          </div>
                          <h4 class="card-title">Время окончания</h4>
                        </div>
                        <div class="card-body" >
                          <div class="form-group" >
                            <input type="text" name="NewtimeEnd"  required  class="form-control timepicker" value="<?=$time[1]?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label label-checkbox"></label>
                    <div class="col-sm-10 checkbox-radios">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" required  type="checkbox" value=""> Я согласен на обработку персональных данных
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-2 col-form-label label-checkbox"></label>
                    <div class="col-sm-10 checkbox-radios">
                      <div class="form-check">
                        <button type="submit" class="btn btn-warning">Отправить</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <script>
    $(document).ready(function() {
      md.initFormExtendedDatetimepickers();
      if ($('.slider').length != 0) {
        md.initSliders();
      }
    });
  </script>
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $sidebar_img_container = $sidebar.find('.sidebar-background');
        $full_page = $('.full-page');
        $sidebar_responsive = $('body > .navbar-collapse');
        window_width = $(window).width();
        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }
        }
        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });
        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');
          $(this).siblings().removeClass('active');
          $(this).addClass('active');
          var new_color = $(this).data('color');
          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }
          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }
          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });
        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');
          var new_color = $(this).data('background-color');
          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });
        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');
          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');
          var new_image = $(this).find("img").attr('src');
          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }
          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }
          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }
          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });
        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');
          $input = $(this);
          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }
            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }
            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }
            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }
            background_image = false;
          }
        });
        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');
          $input = $(this);
          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;
            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {
            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
            setTimeout(function() {
              $('body').addClass('sidebar-mini');
              md.misc.sidebar_mini_active = true;
            }, 300);
          }
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });
      });
    });
  </script>
</body>
</html>

