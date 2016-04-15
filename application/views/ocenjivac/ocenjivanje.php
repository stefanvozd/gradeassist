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
 
<div class="row">
        <div class="col-sm-12">
          <div class="box box-color box-bordered">
            <div class="box-title">
              <h3>asdf</h3>
            </div>
            <div class="box-content nopadding">
              <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper no-footer">
                  
                <div id="DataTables_Table_2_filter" class="dataTables_filter"> 
                  <div class="DTTT_container"><a class="DTTT_button DTTT_button_copy" id="ToolTables_DataTables_Table_3_0" tabindex="0" aria-controls="DataTables_Table_3"><span>Kopiraj</span>
                    <div style="position: absolute; left: 0px; top: 0px; width: 42px; height: 30px; z-index: 99;">
                      <embed id="ZeroClipboard_TableToolsMovie_1" src="js/plugins/datatables/extensions/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="42" height="30" name="ZeroClipboard_TableToolsMovie_1" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=1&amp;width=42&amp;height=30" wmode="transparent">
                    </div>
                    </a><a class="DTTT_button DTTT_button_csv" id="ToolTables_DataTables_Table_3_1" tabindex="0" aria-controls="DataTables_Table_3"><span>CSV</span>
                    <div style="position: absolute; left: 0px; top: 0px; width: 35px; height: 30px; z-index: 99;">
                      <embed id="ZeroClipboard_TableToolsMovie_2" src="js/plugins/datatables/extensions/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="35" height="30" name="ZeroClipboard_TableToolsMovie_2" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=2&amp;width=35&amp;height=30" wmode="transparent">
                    </div>
                    </a><a class="DTTT_button DTTT_button_xls" id="ToolTables_DataTables_Table_3_2" tabindex="0" aria-controls="DataTables_Table_3"><span>Excel</span>
                    <div style="position: absolute; left: 0px; top: 0px; width: 42px; height: 30px; z-index: 99;">
                      <embed id="ZeroClipboard_TableToolsMovie_3" src="js/plugins/datatables/extensions/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="42" height="30" name="ZeroClipboard_TableToolsMovie_3" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=3&amp;width=42&amp;height=30" wmode="transparent">
                    </div>
                    </a><a class="DTTT_button DTTT_button_pdf" id="ToolTables_DataTables_Table_3_3" tabindex="0" aria-controls="DataTables_Table_3"><span>PDF</span>
                    <div style="position: absolute; left: 0px; top: 0px; width: 36px; height: 30px; z-index: 99;">
                      <embed id="ZeroClipboard_TableToolsMovie_4" src="js/plugins/datatables/extensions/copy_csv_xls_pdf.swf" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="36" height="30" name="ZeroClipboard_TableToolsMovie_4" align="middle" allowscriptaccess="always" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="id=4&amp;width=36&amp;height=30" wmode="transparent">
                    </div>
                    </a><a class="DTTT_button DTTT_button_print" id="ToolTables_DataTables_Table_3_4" title="View print view" tabindex="0" aria-controls="DataTables_Table_3"><span>Štampaj</span></a></div>
                </div>
                  
                <table class="table table-hover table-nomargin table-bordered dataTable dataTable-column_filter no-footer" data-column_filter_types="null,select,text,select,daterange,null" data-column_filter_dateformat="dd-mm-yy" data-nosort="0" data-checkall="all" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                      <th class="with-checkbox sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 17px;"> <input type="checkbox" name="check_all" class="dataTable-checkall">
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 563px;">Student</th>
                      <th class="hidden-350 sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" aria-label="Status: activate to sort column ascending" style="width: 130px;"><span class="hidden-350 sorting" style="width: 130px;">Status</span></th>
                      <th class="hidden-350 sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 130px;">Ocena</th>
                      <th class="hidden-1024 sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Member since: activate to sort column ascending" style="width: 120px;">Period</th>
                      <th class="hidden-480 sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1" aria-label="Options: activate to sort column ascending" style="width: 219px;">Akcije</th>

                    </tr>

                  </thead>
                  <tbody>
                    <?php foreach ($rows as $info):?>
                    <tr role="row" class="odd <?php  pringStatusColor($info->Status); ?>">
                      <td class="with-checkbox"><input type="checkbox" name="check" value="1"></td>
                      <td><?php echo $info->Ime." ".$info->Prezime ?></td>
                      <td class="hidden-350"><span class="label <?php  pringStatusLabelColor($info->Status); ?>"><?php echo $info->Status ?></span></td>
                      <td class="hidden-350 "> <?php echo $info->Poeni; ?> </td>
                      <td class="hidden-1024"><?php echo $info->DatumVremeKraj ?></td>
                      <td class="hidden-480"><a href="<?php echo getBaseURL().UserData::getUserType()."/oceni/zadatak/". $info->IDZad; ?>" class="btn" rel="tooltip" title="" data-original-title="Oceni"> <i class="fa fa-search"></i> </a> <a href="#" class="btn" rel="tooltip" title="" data-original-title="Preuzmi"> <i class="fa fa-download"></i> </a></td>
                    </tr>
                   <?php endforeach;?>
                  </tbody>
                </table>
               <!-- <div class="dataTables_info" id="DataTables_Table_2_info" role="status" aria-live="polite">Prikaz 1 do 10 od 22 studenta</div>
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_2_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_2" data-dt-idx="0" tabindex="0" id="DataTables_Table_2_previous">Prethodna</a><span><a class="paginate_button current" aria-controls="DataTables_Table_2" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_2" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="DataTables_Table_2" data-dt-idx="3" tabindex="0">3</a></span><a class="paginate_button next" aria-controls="DataTables_Table_2" data-dt-idx="4" tabindex="0" id="DataTables_Table_2_next">Sledeća</a></div> -->
              </div>
            </div>
          </div>
        </div>
      </div>