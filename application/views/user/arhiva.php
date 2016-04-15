<!--Nikola Maksimovic -->
<div class="row">
<div class="col-sm-12">
    <div class="box box-color box-bordered">
      <div class="box-title">
        <h3>
          <i class="fa fa-table"></i>
          Arhiva
        </h3>
      </div>
      <div class="box-content nopadding">
        <div id="DataTables_Table_5_wrapper" class="dataTables_wrapper no-footer">
                                    
                                    <table class="table table-hover table-nomargin table-bordered dataTable dataTable-tools no-footer" id="DataTables_Table_5" role="grid" aria-describedby="DataTables_Table_5_info" style="width: 100%;">
          <thead>
            <tr role="row">
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 40px;">Predmet</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" >Naziv</th>
              <th class="hidden-350 sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 130px;">Tip</th>
              <th class="hidden-1024 sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 120px;">Period</th>
              <th class="hidden-480 sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" style="width: 120px;">Akcija</th>
            </tr>
          </thead>
          <tbody>
                    <?php foreach ($arhiva as $row):?>
                    <tr role="row" class="odd">
                      <td><?php echo $row->IDPre ?></td>
                      <td><?php echo $row->Naziv ?></td>
                      <td class="hidden-350"> <?php echo $row->Tip ?> </td>
                      <td class="hidden-1024"><?php echo $row->DatumVremeKraj ?></td>
                      <td class="hidden-480"><a href="<?php echo getBaseURL().userdata::getUserType()."/obaveza/pregled/".$row->IDOba?>" class="btn" rel="tooltip" title="" data-original-title="Detaljnije"> <i class="fa fa-search"></i></a></td>
                      </tr>
                    <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>