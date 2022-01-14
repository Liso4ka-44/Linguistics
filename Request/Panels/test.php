<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-icon card-header-rose">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Поступившие заявки с Google Forms <?php if($rowtable['year']!=''){ echo "за ".$rowtable['year']." год";} ?></h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                        <?php  foreach ($array[0] as $key ):
                              if($key!=""): ?>
                                <th><?=$key?></th>
                        <?  endif; endforeach; ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for($i=1;$i < count($array);$i++) :?>
                          <tr>
                            <?php foreach($array[$i] as $key): ?>
                              <td><?=$key?></td>
                            <?php endforeach; ?>
                          </tr>
                        <?php endfor; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="mr-auto ml-auto text-center">
                      <a href='addgoogletable.php?table=del&id=<?=$rowtable['№']?>' ><button type="button" class="btn btn-primary">Удалить таблицу</button></a> 
                  </div>
                </div>
              </div>
            </div>