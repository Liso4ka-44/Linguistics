<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="icon" sizes="76x76" type="image/png" href="../assets/img/logo.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Список заявок</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>
<body>
  <div class="wrapper ">
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
            <a class="navbar-brand" href="javascript:;">Список заявок</a>
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
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <a href='addRequest.php'><button type="button" class="btn btn-warning">Новая заявка</button></a>  
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                    <h4 class="card-title">Ваши заявки</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                        <th>Номер</th>
                          <th>Отправитель</th>
                          <th>Email</th>
                          <th>Название</th>
                          <th>Время</th>
                          <th>Тезис</th>
                          <th>Дата</th>
                          <th class="disabled-sorting">Статья</th>
                          <th>Статус</th>
                          <th class="disabled-sorting text-right">Действия</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                        <th>Номер</th>
                        <th>Отправитель</th>
                          <th>Email</th>
                          <th>Название</th>
                          <th>Время</th>
                          <th>Тезис</th>
                          <th>Дата</th>
                          <th>Статья</th>
                          <th>Статус</th>
                          <th class="text-right">Действия</th>
                        </tr>
                      </tfoot>
                      <tbody>
                      <?php
                        $listRequest = mysqli_query($connect,"SELECT * FROM `request` WHERE `IdRequestUsers` = $_SESSION[id]");
                        while(($row = mysqli_fetch_assoc($listRequest)) != false) :
                          $docus = mysqli_query($connect,"SELECT `email`,`Name`,`Surname` FROM `requestusers` WHERE `IdRequestUsers` = $row[IdRequestUsers] ");
                          $doc = mysqli_fetch_assoc($docus);
                          $status = (int) $row['Status'] ;
                          $statusRequest = mysqli_query($connect,"SELECT `Title` FROM `statusRequest` WHERE `№` = $status ");
                          $status = mysqli_fetch_assoc($statusRequest);
                          switch ($status["Title"]) {
                            case 'Отклонена' :
                              $case = "table-danger";
                              break;
                            case 'Обработка' :
                              $case = "table-info";
                              break;
                            case 'Одобрена' :
                              $case = "table-success";
                              break;
                            case 'На рассмотрении' :
                              $case = "table-warning";
                              break;
                          }
                        ?>
                        <tr class="<?=$case?>">
                        <td><?=$row['№']?></td>
                          <td><?=$doc['Name']." ".$doc['Surname']?></td>
                          <td><?=$doc['email']?></td>
                          <td><?=$row['Title']?></td>
                          <td><?=$row['Time']?></td>
                          <td>
                          <button class="btn btn-info" data-toggle="modal" data-target="#myModal" value="<?=$row['Thesis']?>" >Посмотреть</button></td>
                          <td><?=$row['Date']?></td>
                          <td>
                            <?php
                              if (!empty($row['Article'])){
                                echo "<a href='/Request/Panels$row[Article]' download>Скачать</a></td>";
                              } else{
                                echo "Статья отсутствует";
                              }
                            ?>  
                          </td>
                          <td><?=$status["Title"]?></td>
                          <td class="text-right">
                          <?php include ('elements/selectuinUsers.php');?>
                          </td>
                        </tr>
                        <?php endwhile;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Тезис заявки</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p id="thesisReq" style="word-wrap: break-word;"></p>
                    </div>
                    <div class="modal-footer mr-auto ml-auto">
                      <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
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
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script> 
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>>
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <script src="../assets/js/os.js"></script>  
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.."></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.mi.."></script> 
  <script>
$(document).ready(function(){
	$('.selectpicker').change(function(){
		window.location.href = $(this).val();
	});
});
  $(".btn-info").click(function() {
  let messageRequest =document.getElementById('thesisReq');
  let note_id = $(this).attr("value");
  messageRequest.innerHTML = note_id ;

});
</script>
</body>
</html>
