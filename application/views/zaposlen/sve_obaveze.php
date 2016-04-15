<div class="row">
<div class="col-sm-12">
		<div class="box box-color box-bordered">
			<div class="box-title">
				<h3>
					<i class="fa fa-table"></i>
					Sve obaveze
				</h3>
			</div>
			<div class="box-content nopadding">
				<div id="DataTables_Table_5_wrapper" class="dataTables_wrapper no-footer">
                                    
				<table class="table table-hover table-nomargin table-bordered dataTable dataTable-tools no-footer" id="DataTables_Table_5" role="grid" aria-describedby="DataTables_Table_5_info" style="width: 100%;">
					<thead>
						<tr role="row">
						<th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 40px;">Predmet</th>
	                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 271px;">Obaveza</th>
	                    <th class="hidden-1024 sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 70px;">Tip</th>
	                    <th class="hidden-800 sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 241px;">Ime i Prezime</th>
	                    <th class="hidden-1024 sorting" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" style="width: 80px;">Datum Početka</th>
	                    <th class="hidden-350 sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_5" rowspan="1" colspan="1" aria-sort="ascending" style="width: 80px;">Datum Kraja</th>
	                    </tr>
					</thead>
					<tbody>
					<?php foreach ($obaveze as $row):?>
                    <tr role="row" class="odd ">
                      <td><?php echo strtoupper($row->IDPre) ?></td>
                      <td class="hidden-350"><a href="<?php echo current_url().'/'.$row->IDOba; ?>"> <?php echo $row->Naziv; ?> </a></td>
                      <td class="hidden-1024"> <?php echo $row->Tip; ?></td>
                      <td class="hidden-800 "> <?php echo $row->Ime.' '.$row->Prezime; ?> </td>
                      <td class="hidden-1024"><?php echo $row->DatumVremePoc ?></td>
                      <td class="hidden-350"><?php echo $row->DatumVremeKraj ?></td>
                      
                    </tr>
                   <?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>