<div class="row">
  <div class="col-sm-12">
    <div class="box box-color box-bordered">
      <div class="box-title">
        <h3> <i class="fa fa-bar-chart-o"></i>Spisak angažovanih studenata</h3>
      </div>
      <div class="box-content nopadding">
          <div id="DataTables_Table_5_wrapper" class="dataTables_wrapper no-footer">
                                    
        <table class="table table-hover table-nomargin table-bordered dataTable dataTable-tools no-footer" id="DataTables_Table_5" role="grid" aria-describedby="DataTables_Table_5_info" style="width: 100%;">
          <thead>
            <tr role="row">
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 40px;">Broj Indeksa</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1">Ime</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1">Prezime</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($demonstratori as $info):?>
                    <tr role="row" class="odd ">
                      <td class="hidden-350"> <?php echo $info->BrojIndexa ?></td>
                      <td class="hidden-350 "> <?php echo $info->Ime; ?> </td>
                      <td class="hidden-1024"><?php echo $info->Prezime ?></td>
                    </tr>
            <?php endforeach;?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>