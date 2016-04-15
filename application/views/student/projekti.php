<?php 
    if(!strcmp($tip,'lab')){
        $title = 'Laboratorijske vežbe';
        $datum = 'Vreme održavanja';
        $lab = TRUE;
    } else {
        $title = 'Moji projekti';
        $datum = 'Krajnji rok';
        $lab = FALSE;
    }
    
?>
    <div class="row">
<div class="col-sm-12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="fa fa-table"></i>
                   <?php echo $title ?>
                </h3>
            </div>
            <div class="box-content nopadding">
                <div id="DataTables_Table_5_wrapper" class="dataTables_wrapper no-footer">
                                    
                <table class="table table-hover table-nomargin table-bordered dataTable dataTable-tools no-footer" id="DataTables_Table_5" role="grid" aria-describedby="DataTables_Table_5_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 30px;">Predmet</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="min-width: 200px;">Naziv</th>
                        
                        <th class="hidden-800 sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 250px;"><?php echo $datum ?></th>
                    <?php if (@$ocene): ?>
                        <th class="hidden-1024 sorting" tabindex="0" rowspan="1" colspan="1">Komentar</th>
                        <th class="hidden-350 sorting" tabindex="0" rowspan="1" colspan="1" style="width: 70px;">Status</th>
                        <th class="hidden-350 sorting" tabindex="0" rowspan="1" colspan="1" style="width: 70px;">Poeni</th>
                    <?php else: ?>
                        <th class="hidden-350" tabindex="0" rowspan="1" colspan="1" style="width: 120px;">Akcija</th>
                    <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach ($rows as $row): ?>
                    <tr role="row" class="odd ">
                      <td><?php echo strtoupper($row->IDPre) ?></td>
                      <td><a href="<?php echo getBaseURL() . UserData::getUserType().'/obaveza/pregled/'.$row->IDOba ?>"> <?php echo $row->Naziv; ?> </a></td>
                      
                      <td class="hidden-350"><?php if($lab) echo $row->DatumVremePoc; else echo $row->DatumVremeKraj ?></td>
                    <?php if (@$ocene): ?>
                      <td class="hidden-1024"><?php if($row->Arhiviran) echo $row->Komentar ?></td>
                      <td class="hidden-350"><?php if($row->Arhiviran) echo $row->Status; else echo 'u toku' ?></td>
                      <td class="hidden-350">
                        <a href="<?php echo getBaseURL() . UserData::getUserType().'/predaja/obaveza/'.$row->IDOba ?>"  rel="tooltip" title="Pregled">
                            <?php echo $row->Poeni ?>
                        </a>
                      </td>
                    <?php else: ?>
                      <td class="hidden-350">
                        <?php if(!$lab): ?>
                            <a href="<?php echo getBaseURL() . UserData::getUserType() ?>/predaja/obaveza/<?php echo $row->IDOba ?>" class="btn" rel="tooltip" title="Predaj" data-toggle="modal">
                                <i class="fa fa-upload"></i>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo getBaseURL() . UserData::getUserType() ?>/obaveza/pregled/<?php echo $row->IDOba ?>" class="btn" rel="tooltip" title="Detaljno" data-toggle="modal">
                            <i class="fa fa-search"></i>
                        </a>
                      </td>
                    <?php endif; ?>
                    </tr>
                   <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>