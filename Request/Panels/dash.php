
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" sizes="76x76" type="image/png" href="../assets/img/logo.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Аналитика</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
</head>
<body class="">
  <div class="wrapper ">
  <?php 
  include("navPanels.php");
  $arraSevenDaysAnalitiks = [
    0=>'https://api-metrika.yandex.net/stat/v1/data/bytime?ids=86243536&group=day&metrics=ym:s:visits,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds&date1=6daysAgo&date2=6daysAgo',
    1=>'https://api-metrika.yandex.net/stat/v1/data/bytime?ids=86243536&group=day&metrics=ym:s:visits,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds&date1=5daysAgo&date2=5daysAgo',
    2=>'https://api-metrika.yandex.net/stat/v1/data/bytime?ids=86243536&group=day&metrics=ym:s:visits,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds&date1=4daysAgo&date2=4daysAgo',
    3=>'https://api-metrika.yandex.net/stat/v1/data/bytime?ids=86243536&group=day&metrics=ym:s:visits,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds&date1=3daysAgo&date2=3daysAgo',
    4=>'https://api-metrika.yandex.net/stat/v1/data/bytime?ids=86243536&group=day&metrics=ym:s:visits,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds&date1=2daysAgo&date2=2daysAgo',
    5=>'https://api-metrika.yandex.net/stat/v1/data/bytime?ids=86243536&group=day&metrics=ym:s:visits,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds&date1=1daysAgo&date2=1daysAgo',
    6=>'https://api-metrika.yandex.net/stat/v1/data/bytime?ids=86243536&group=day&metrics=ym:s:visits,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds&date1=today&date2=today'
  ];
  foreach ($arraSevenDaysAnalitiks as $key => $value){
    //Данные
    $sevendays = json_decode(file_get_contents($value), true);
    $metriksSevanDays[$key]["metrics"] = $sevendays["query"]["metrics"];// каждый 0 к каждому 0
    $totalSevanDays[$key]["totals"] = $sevendays["totals"];

    //дни
    $datsintervalSeven[] = $sevendays["time_intervals"][0][0];
    setlocale(LC_ALL, 'ru-RU.utf8');
    $dateanalitik=(int) strftime('%u', strtotime($sevendays["time_intervals"][0][0]));
    $days = array( 1 => "Пн" , 2 => "Вт" , 3 => "Ср" ,4 => "Чт" ,5 => "Пт" ,6 => "Сб" ,7 =>"Вс" );
    $sevendaysDateanalitiks[]=$days[$dateanalitik];
  }
  $jsdays="'".$sevendaysDateanalitiks[0]."','".$sevendaysDateanalitiks[1]."','".$sevendaysDateanalitiks[2]."','".$sevendaysDateanalitiks[3]."','".$sevendaysDateanalitiks[4]."','".$sevendaysDateanalitiks[5]."','".$sevendaysDateanalitiks[6]."'";
  foreach($totalSevanDays as $key => $value) {
    $valueVisitsChart[] = $totalSevanDays[$key]["totals"][0][0];
    $valuePageviewsChart[] = $totalSevanDays[$key]["totals"][3][0];
  }

  $geographyChart = json_decode(file_get_contents("https://api-metrika.yandex.net/stat/v1/data/bytime?ids=86243536&preset=geo_country&group=year&metrics=ym:s:pageviews&date1=365daysAgo&date2=today"), true);

  foreach ($geographyChart["data"] as $key =>$value) {
    $geographyChartName[] = $geographyChart["data"][$key]["dimensions"][0]["name"];
    $geographyChartvalue[] = $geographyChart["data"][$key]["metrics"][0][1];  
    $namefederation[]=$geographyChart["data"][$key]["dimensions"][0]["iso_name"];
  }

  $gender = json_decode(file_get_contents("https://api-metrika.yandex.net/stat/v1/data/bytime?ids=86243536&preset=geo_country&group=year&metrics=ym:s:pageviews&date1=365daysAgo&date2=today"), true);
  $male = $gender["data"][0]["metrics"][0][1];
  $famale = $gender["data"][1]["metrics"][0][1];
  $allvaluegender=$famale+$male;
  $percentfamale = floor($famale / $allvaluegender *100);
  $percentmale =floor($male / $allvaluegender *100);

  // ЗАявки /////////////////////////////////////////////////////////
  $bdreq = mysqli_query($connect,"SELECT COUNT(*) as count FROM  request ");
  $roCount = mysqli_fetch_assoc($bdreq);
  $reCount = $roCount['count'];
  $bdForms = mysqli_query($connect,"SELECT * FROM `googleforms` ");
  while(($rowCount = mysqli_fetch_assoc($bdForms)) != false) {
   $csv = file_get_contents($rowCount["url"]);
   $csv = explode("\r\n", $csv);
   $array = array_map('str_getcsv', $csv);
   $countForms+=count($array)-1;
  }
  $allCount=$countForms+(int)$reCount; 

   /// метрика за сейчас
  $params2 = array(
    'ids'     => '86243536', 
    'metrics' => 'ym:s:visits,ym:s:pageviews,ym:s:users,ym:s:bounceRate,ym:s:pageDepth,ym:s:avgVisitDurationSeconds',
    'date1'   => 'today', // 7daysAgo - неделя, 30daysAgo - месяц, 365daysAgo - год
    'date2'   => 'today',
  );
  $ch = curl_init('https://api-metrika.yandex.net/stat/v1/data/bytime?' . urldecode(http_build_query($params2)));
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $token));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_HEADER, false);
  $res = curl_exec($ch);
  curl_close($ch);
  $res = json_decode($res, true);	

?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Аналитика</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card ">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons"></i>
                    </div>
                    <h4 class="card-title">Просмотры страниц по странам</h4>
                  </div>
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="table-responsive table-sales">
                          <table class="table">
                            <tbody>
                              <?php
                                foreach ($geographyChartvalue as $key => $value) {
                                  $allvalueGeography +=$value;
                                }
                                foreach ($geographyChartName as $key => $value) :
                                  $percent = $geographyChartvalue[$key]/$allvalueGeography *100;
                              ?>
                              <tr>
                                <td><?=$value?></td>
                                <td class="text-right">
                                  Просмотров : 
                                  <?=$geographyChartvalue[$key]?>
                                </td>
                                <td class="text-right">
                                  <?=$percent?> %
                                </td>
                              </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-6 ml-auto mr-auto">
                        <div id="worldMap" style="height: 300px;"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-rose" data-header-animation="true">
                    <div class="ct-chart" id="websiteViewsChart"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title text-center">Глубина просмотра сайта за неделю</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-success" data-header-animation="true">
                    <div class="ct-chart" id="dailySalesChart"></div>
                  </div>
                  <div class="card-body">
                  <h4 class="card-title text-center">Визиты сайта за неделю</h4>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-icon card-header-danger">
                    <div class="card-icon">
                      <i class="material-icons">pie_chart</i>
                    </div>
                    <h4 class="card-title">Диаграмма поситителей по полу %</h4>
                  </div>
                  <div class="card-body">
                    <div id="chartPreferences" class="ct-chart"></div>
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-12">
                        <h6 class="card-category ">Пол</h6>
                      </div>
                      <div class="col-md-12">
                        <i class="fa fa-circle text-info"></i> мужской 
                        <i class="fa fa-circle text-warning"></i> женский
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6  ml-auto">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">fact_check</i>
                    </div>
                    <p class="card-category">Всего заявок </p>
                    <h3 class="card-title"><?=$allCount?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> Из всех данных добавлинных на сайт 
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 ">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">fact_check</i>
                    </div>
                    <p class="card-category">Заявок с сайта</p>
                    <h3 class="card-title"><?=$reCount?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> Из данных добавлинных на сайт 
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 ">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">fact_check</i>
                    </div>
                    <p class="card-category">Заявок с Google Forms</p>
                    <h3 class="card-title"><?=$countForms?></h3>
                  </div>
                  <div class="card-footer">
                   <div class="stats">
                      <i class="material-icons">date_range</i> Из данных Google Form добавлинных на сайт 
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6  ml-auto">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">perm_identity</i>
                    </div>
                    <p class="card-category">Визиты </p>
                    <h3 class="card-title"><?=$res['totals'][0][0]?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> За последние 24 часа
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">query_builder</i>
                    </div>
                    <p class="card-category">Среднее время на сайте в секундах</p>
                    <h3 class="card-title"><?=$res['totals'][5][0]?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> За последние 24 часа
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">view_list</i>
                    </div>
                    <p class="card-category">Просмотры</p>
                    <h3 class="card-title"><?=$res['totals'][1][0]?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> За последние 24 часа
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">report_problem</i>
                    </div>
                    <p class="card-category ">Отказы %</p>
                    <h3 class="card-title"><?=$res['totals'][3][0]?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> За последние 24 часа
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">search</i>
                    </div>
                    <p class="card-category">Глубина просмотра</p>
                    <h3 class="card-title"><?=$res['totals'][4][0]?></h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> За последние 24 часа
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
 <script>
  (function() {
    isWindows = navigator.platform.indexOf('Win') > -1 ? true : false;
    if (isWindows) {
      if ($(".sidebar").length != 0) {
        var ps = new PerfectScrollbar('.sidebar');
      }
      if ($(".sidebar-wrapper").length != 0) {
        var ps1 = new PerfectScrollbar('.sidebar-wrapper');
      }
      if ($(".main-panel").length != 0) {
        var ps2 = new PerfectScrollbar('.main-panel');
      }
      if ($(".main").length != 0) {
        var ps3 = new PerfectScrollbar('main');
      }
      $('html').addClass('perfect-scrollbar-on');
    } else {
      $('html').addClass('perfect-scrollbar-off');
    }
    })();
  var breakCards = true;
  var searchVisible = 0;
  var transparent = true;
  var transparentDemo = true;
  var fixedTop = false;
  var mobile_menu_visible = 0,
  mobile_menu_initialized = false,
  toggle_initialized = false,
  bootstrap_nav_initialized = false;
  var seq = 0,
  delays = 80,
  durations = 500;
  var seq2 = 0,
  delays2 = 80,
  durations2 = 500;
  $(document).ready(function() {
    $sidebar = $('.sidebar');
    window_width = $(window).width();
    $('body').bootstrapMaterialDesign({
      autofill: false
    });
    md.initSidebarsCheck();
    window_width = $(window).width();
    md.checkSidebarImage();
    md.initMinimizeSidebar();

    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
    var $el = $(this);
    var $parent = $(this).offsetParent(".dropdown-menu");
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass('show');

    $(this).closest("a").toggleClass('open');

    $(this).parents('a.dropdown-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-menu .show').removeClass("show");
    });
    if (!$parent.parent().hasClass('navbar-nav')) {
      $el.next().css({
        "top": $el[0].offsetTop,
        "left": $parent.outerWidth() - 4
      });
    }
    return false;
    });
    if (breakCards == true) {
   
    $('[data-header-animation="true"]').each(function() {
      var $fix_button = $(this)
      var $card = $(this).parent('.card');

      $card.find('.fix-broken-card').click(function() {
        console.log(this);
        var $header = $(this).parent().parent().siblings('.card-header, .card-header-image');

        $header.removeClass('hinge').addClass('fadeInDown');

        $card.attr('data-count', 0);

        setTimeout(function() {
          $header.removeClass('fadeInDown animate');
        }, 480);
      });

      $card.mouseenter(function() {
        var $this = $(this);
        hover_count = parseInt($this.attr('data-count'), 10) + 1 || 0;
        $this.attr("data-count", hover_count);

        if (hover_count >= 20) {
          $(this).children('.card-header, .card-header-image').addClass('hinge animated');
        }
      });
    });
    }

  });
  
  $(document).on('click', '.navbar-toggler', function() {
  $toggle = $(this);
  if (mobile_menu_visible == 1) {
    $('html').removeClass('nav-open');

    $('.close-layer').remove();
    setTimeout(function() {
      $toggle.removeClass('toggled');
    }, 400);

    mobile_menu_visible = 0;
  } else {
    setTimeout(function() {
      $toggle.addClass('toggled');
    }, 430);

    var $layer = $('<div class="close-layer"></div>');

    if ($('body').find('.main-panel').length != 0) {
      $layer.appendTo(".main-panel");

    } else if (($('body').hasClass('off-canvas-sidebar'))) {
      $layer.appendTo(".wrapper-full-page");
    }

    setTimeout(function() {
      $layer.addClass('visible');
    }, 100);

    $layer.click(function() {
      $('html').removeClass('nav-open');
      mobile_menu_visible = 0;

      $layer.removeClass('visible');

      setTimeout(function() {
        $layer.remove();
        $toggle.removeClass('toggled');

      }, 400);
    });

    $('html').addClass('nav-open');
    mobile_menu_visible = 1;

  }

  });
  // activate collapse right menu when the windows is resized
  $(window).resize(function() {
  md.initSidebarsCheck();

  // reset the seq for charts drawing animations
  seq = seq2 = 0;

  setTimeout(function() {
    md.initDashboardPageCharts();
  }, 500);
  });
  
  md = {
  misc: {
    navbar_menu_visible: 0,
    active_collapse: true,
    disabled_collapse_init: 0,
  },
  /* ----------==========     Меню    ==========---------- */
  checkSidebarImage: function() {
    $sidebar = $('.sidebar');
    image_src = $sidebar.data('image');

    if (image_src !== undefined) {
      sidebar_container = '<div class="sidebar-background" style="background-image: url(' + image_src + ') "/>';
      $sidebar.append(sidebar_container);
    }
  },
  initSliders: function() {
    // Sliders for demo purpose
    var slider = document.getElementById('sliderRegular');
    noUiSlider.create(slider, {
      start: 40,
      connect: [true, false],
      range: {
        min: 0,
        max: 100
      }
    });

    var slider2 = document.getElementById('sliderDouble');

    noUiSlider.create(slider2, {
      start: [20, 60],
      connect: true,
      range: {
        min: 0,
        max: 100
      }
    });
  },
  initSidebarsCheck: function() {
    if ($(window).width() <= 991) {
      if ($sidebar.length != 0) {
        md.initRightMenu();
      }
    }
  },
  checkFullPageBackgroundImage: function() {
    $page = $('.full-page');
    image_src = $page.data('image');

    if (image_src !== undefined) {
      image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
      $page.append(image_container);
    }
  },
  initDashboardPageCharts: function() {
    if ($('#dailySalesChart').length != 0 || $('#completedTasksChart').length != 0 || $('#websiteViewsChart').length != 0) {
      /* ----------==========     Daily Sales Chart initialization    ==========---------- */
      dataDailySalesChart = {
        labels: [<?=$jsdays?>],
        series: [
          [<?=$valueVisitsChart[0]?>, <?=$valueVisitsChart[1]?>, <?=$valueVisitsChart[2]?>, <?=$valueVisitsChart[3]?>, <?=$valueVisitsChart[4]?>, <?=$valueVisitsChart[5]?>, <?=$valueVisitsChart[6]?>]
        ]
      };
      optionsDailySalesChart = {
        lineSmooth: Chartist.Interpolation.cardinal({
          tension: 0
        }),
        low: 0,
        high: 100, // we recommend you to set the high sa the biggest value + something for a better look
        chartPadding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
      }
      var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);
      md.startAnimationForLineChart(dailySalesChart);
      //Глубина просмотра сайта за неделю
      var dataWebsiteViewsChart = {
        labels: [<?=$jsdays?>],
        series: [
          [<?=$valuePageviewsChart[0]?>, <?=$valuePageviewsChart[1]?>, <?=$valuePageviewsChart[2]?>, <?=$valuePageviewsChart[3]?>, <?=$valuePageviewsChart[4]?>, <?=$valuePageviewsChart[5]?>, <?=ceil($valuePageviewsChart[6])?>]
        ]
      };
      var optionsWebsiteViewsChart = {
        axisX: {
          showGrid: false
        },
        low: 0,
        high: 10,// максимальное значение
        chartPadding: {
          top: 0,
          right: 5,
          bottom: 0,
          left: 0
        }
      };
      var responsiveOptions = [
        ['screen and (max-width: 640px)', {
          seriesBarDistance: 5,
          axisX: {
            labelInterpolationFnc: function(value) {
              return value[0];
            }
          }
        }]
      ];
      var websiteViewsChart = Chartist.Bar('#websiteViewsChart', dataWebsiteViewsChart, optionsWebsiteViewsChart, responsiveOptions);
      md.startAnimationForBarChart(websiteViewsChart);
    }
  },

  initMinimizeSidebar: function() {

    $('#minimizeSidebar').click(function() {
      var $btn = $(this);

      if (md.misc.sidebar_mini_active == true) {
        $('body').removeClass('sidebar-mini');
        md.misc.sidebar_mini_active = false;
      } else {
        $('body').addClass('sidebar-mini');
        md.misc.sidebar_mini_active = true;
      }

      // we simulate the window Resize so the charts will get updated in realtime.
      var simulateWindowResize = setInterval(function() {
        window.dispatchEvent(new Event('resize'));
      }, 180);

      // we stop the simulation of Window Resize after the animations are completed
      setTimeout(function() {
        clearInterval(simulateWindowResize);
      }, 1000);
    });
  },

  checkScrollForTransparentNavbar: debounce(function() {
    if ($(document).scrollTop() > 260) {
      if (transparent) {
        transparent = false;
        $('.navbar-color-on-scroll').removeClass('navbar-transparent');
      }
    } else {
      if (!transparent) {
        transparent = true;
        $('.navbar-color-on-scroll').addClass('navbar-transparent');
      }
    }
  }, 17),


  initRightMenu: debounce(function() {
    $sidebar_wrapper = $('.sidebar-wrapper');

    if (!mobile_menu_initialized) {
      $navbar = $('nav').find('.navbar-collapse').children('.navbar-nav');

      mobile_menu_content = '';

      nav_content = $navbar.html();

      nav_content = '<ul class="nav navbar-nav nav-mobile-menu">' + nav_content + '</ul>';

      navbar_form = $('nav').find('.navbar-form').get(0).outerHTML;

      $sidebar_nav = $sidebar_wrapper.find(' > .nav');

      // insert the navbar form before the sidebar list
      $nav_content = $(nav_content);
      $navbar_form = $(navbar_form);
      $nav_content.insertBefore($sidebar_nav);
      $navbar_form.insertBefore($nav_content);

      $(".sidebar-wrapper .dropdown .dropdown-menu > li > a").click(function(event) {
        event.stopPropagation();

      });

      // simulate resize so all the charts/maps will be redrawn
      window.dispatchEvent(new Event('resize'));

      mobile_menu_initialized = true;
    } else {
      if ($(window).width() > 991) {
        // reset all the additions that we made for the sidebar wrapper only if the screen is bigger than 991px
        $sidebar_wrapper.find('.navbar-form').remove();
        $sidebar_wrapper.find('.nav-mobile-menu').remove();

        mobile_menu_initialized = false;
      }
    }
  }, 200),
  startAnimationForLineChart: function(chart) {
    chart.on('draw', function(data) {
      if (data.type === 'line' || data.type === 'area') {
        data.element.animate({
          d: {
            begin: 600,
            dur: 700,
            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
            to: data.path.clone().stringify(),
            easing: Chartist.Svg.Easing.easeOutQuint
          }
        });
      } else if (data.type === 'point') {
        seq++;
        data.element.animate({
          opacity: {
            begin: seq * delays,
            dur: durations,
            from: 0,
            to: 1,
            easing: 'ease'
          }
        });
      }
    });
    seq = 0;
  },
  startAnimationForBarChart: function(chart) {

    chart.on('draw', function(data) {
      if (data.type === 'bar') {
        seq2++;
        data.element.animate({
          opacity: {
            begin: seq2 * delays2,
            dur: durations2,
            from: 0,
            to: 1,
            easing: 'ease'
          }
        });
      }
    });

    seq2 = 0;
  },
  initVectorMap: function() {
    var mapData = {
      <?php foreach($namefederation as $key=> $value):
             echo "$value";?>
              : 
      <?=$geographyChartvalue[$key]*180?>,
      <?php endforeach?>
    };

    $('#worldMap').vectorMap({
      map: 'world_mill_en',
      backgroundColor: "transparent",
      zoomOnScroll: false,
      regionStyle: {
        initial: {
          fill: '#e4e4e4',
          "fill-opacity": 0.9,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 0
        }
      },

      series: {
        regions: [{
          values: mapData,
          scale: ["#AAAAAA", "#444444"],
          normalizeFunction: 'polynomial'
        }]
      },
    });
  }
  }

  function debounce(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this,
      args = arguments;
    clearTimeout(timeout);
    timeout = setTimeout(function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    }, wait);
    if (immediate && !timeout) func.apply(context, args);
  };
  };

   function initCharts  () {
        var dataPreferences = {
          // 1 муж 2 женский
          labels: [<?=$percentmale?>, <?=$percentfamale?>],
          series: [<?=$male?>, <?=$famale?>]
        };
  
        var optionsPreferences = {
          height: '150px'
        };
  
        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);
  
        var optionsSimpleBarChart = {
          seriesBarDistance: 10,
          axisX: {
            showGrid: false
          }
        };
  
        var responsiveOptionsSimpleBarChart = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function(value) {
                return value[0];
              }
            }
          }]
        ];
  
        var simpleBarChart = Chartist.Bar('#simpleBarChart', optionsSimpleBarChart, responsiveOptionsSimpleBarChart);
  
        //start animation for the Emails Subscription Chart
        md.startAnimationForBarChart(simpleBarChart);
      
    }

  </script>
  <script src="../assets/demo/os.js"></script>
  <script>
   $(document).ready(function() {
   md.initDashboardPageCharts();
   md.initVectorMap();
   initCharts();

 });
  </script>
</body>
</html>
