           <?php
                function pringStatusColor($status){
                switch ($status) {
                    case "ocenjen":
                        echo "alert-success";
                        break;
                    case "utoku":
                       echo "alert-info";
                        break;
                    default:
                        echo "alert-danger";
                }
                }
                
                 function pringStatusLabelColor($status){
                switch ($status) {
                    case "ocenjen":
                        echo "label-success";
                        break;
                    case "utoku":
                       echo "label-info";
                        break;
                    default:
                        echo "label-danger";
                }
                }
?>
<?php foreach ($predmeti as $row):?>  
<div class="row">
  <div class="col-sm-12">
    <div class="box box-color box-bordered">
      <div class="box-title">
        <h3><?php echo $row->IDPre." ".$row->Naziv ?></h3>
      </div>
      <div class="box-content nopadding">
          <div id="DataTables_Table_5_wrapper" class="dataTables_wrapper no-footer">
                                    
        <table class="table table-hover table-nomargin table-bordered dataTable dataTable-tools no-footer" id="DataTables_Table_5" role="grid" aria-describedby="DataTables_Table_5_info" style="width: 100%;">
          <thead>
            <tr role="row">
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 40px;">Broj Indeksa</th>
              <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1">Student</th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 40px;">Status</th>
                      <th class="hidden-350 sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 70px;">Broj Poena</th>
                      <th class="hidden-350" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 120px;">Akcija</th>
                      </tr>
          </thead>
          <tbody>
           <?php foreach ($row->podaci as $info):?>
                    <tr role="row" class="odd <?php  pringStatusColor($info->Status); ?>">
                      <td><?php echo $info->BrojIndexa ?></td>
                      <td><?php echo $info->Ime." ".$info->Prezime ?></td>
                      <td class="hidden-350"><span class="label <?php  pringStatusLabelColor($info->Status); ?>"><?php echo $info->Status ?></span></td>
                      <td class="hidden-350 "> <?php echo $info->Poeni; ?> </td>
                      <!-- <td class="hidden-1024"><?php echo $info->DatumVremeKraj ?></td> -->
                      <td class="hidden-350"><a href="<?php echo getBaseURL().UserData::getUserType()."/oceni/zadatak/". $info->IDZad; ?>" class="btn" rel="tooltip" title="" data-original-title="Oceni"> <i class="fa fa-search"></i> </a> <a href="<?php echo getBaseURL().UserData::getUserType()."/ocenepregled/download_zadatak/$info->IDZad"?>" class="btn" rel="tooltip" title="" data-original-title="Preuzmi"> <i class="fa fa-download"></i> </a></td>
                    </tr>
                   <?php endforeach;?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>

