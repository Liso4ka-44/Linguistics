<?php
session_start();
  if($_GET['error']=='w'){
    $eror= "md.showNotification('top','center');";
	}
  if($_SESSION['aut'] == true ){
    if($_SESSION['status']=='admin'){
        $list='list';
    }else{
      $list='listus';
    }
    ob_end_clean();
    header("Location: Panels/$list.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" sizes="76x76" type="image/png" href="assets/img/logo.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Регистрация </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>
<body class="off-canvas-sidebar">
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <?php include("nav.php");?>
    </div>
  </nav>
  <div class="wrapper wrapper-full-page">
    <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('assets/img/1.jpg')">
      <div class="container">
        <div class="row">
          <div class="col-md-10 ml-auto mr-auto">
            <div class="card card-signup">
              <h2 class="card-title text-center">Регистрация</h2>>
              <div class="card-body">
                <form action="Panels/re.php" method="post" >
                  <div class="row">
                    <div class="col-md-5 ml-auto">
                      <div class="info info-horizontal">
                        <div class="icon icon-rose">
                          <i class="material-icons">face </i>
                        </div>
                        <div class="description">
                          <h4 class="info-title">Имя</h4>
                          <input type="text" required  name="firstname" class="form-control" placeholder="Имя"> 
                        </div>
                      </div>
                      <div class="info info-horizontal">
                        <div class="icon icon-primary">
                          <i class="material-icons">assignment_ind </i>
                        </div>
                        <div class="description">
                          <h4 class="info-title">Email</h4>
                          <input type="email" required  name="email" class="form-control" placeholder="Email"> 
                        </div>
                      </div>
                      <div class="info info-horizontal">
                        <div class="icon icon-info">
                          <i class="material-icons">group</i>
                        </div>
                        <div class="description">
                          <h4 class="info-title">Логин</h4>
                          <input type="text" minLength="5" required  name="login" class="form-control" placeholder="Логин"> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-5 mr-auto">
                      <div class="info info-horizontal">
                        <div class="description">
                          <h4 class="info-title">Фамилия</h4>
                          <input type="text" required  name="lastname" class="form-control" placeholder="Фамилия">  
                        </div>
                      </div>  
                      <div class="info info-horizontal">
                        <div class="description">
                          <h4 class="info-title">Специальность</h4>
                          <input type="text" required  name="Patronymic" class="form-control" placeholder="Специальность"> 
                        </div>
                      </div>
                      <div class="info info-horizontal">
                        <div class="description">
                          <h4 class="info-title">Пароль</h4>
                          <input type="password" minLength="5" required  name="password" class="form-control" placeholder="Пароль"> 
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8 mr-auto ml-auto my-lg-4" >
                      <h4 class="info-title text-center">О вас</h4>
                      <textarea class="form-control" name="about"></textarea>
                    </div>
                    <div class=" mr-auto ml-auto">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="" checked="">
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>Я даю согласие<a href="#something"> на обработку персональных данных</a>.</label>
                      </div>
                      <div class="text-center">
                        <input type="submit" class="btn btn-primary btn-round mt-4" value="Зарегестрироваться">
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
  </div>
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="assets/js/plugins/chartist.min.js"></script>
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <script src="assets/js/os.js"></script>
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
  <script>
    $(document).ready(function() {
      <?=$eror?>
      md.checkFullPageBackgroundImage();
    });
  </script>
</body>

</html>