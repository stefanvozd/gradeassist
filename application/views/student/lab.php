<!--Nikola Maksimovic-->
<div class="row">
    <div class="col-sm-12">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="fa fa-table"></i>
                    Predstojeće laboratorijske vežbe
                </h3>
            </div>
            <div class="box-content nopadding">
                <table class="table table-hover table-nomargin table-bordered dataTable dataTable-column_filter" data-column_filter_types="select,select,select,select,daterange,null" data-column_filter_dateformat="dd-mm-yy"  data-nosort="0" data-checkall="all">
                    <thead>
                        <tr>
                            <th>Predmet</th>
                            <th>Naziv</th>
                            <th>Status</th>
                            <th class='hidden-350'>Profesor</th>
                            <th class='hidden-1024'>Datum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lab as $row): ?>
                            <tr>
                                <td><?php echo $row->IDPre ?></td>
                                <td>
                                    <?php echo $row->Naziv ?>
                                </td>
                                <td class='hidden-350'><?php if(@$row->Aktivna > 0) {echo 'Aktivan';} else {echo 'Neaktivan';} ?></td></td>
                                <td class='hidden-1024'><?php echo $row->Ime ?><?php echo ' ' ?><?php echo $row->Prezime ?></td>
                                <td class='hidden-480'><?php echo $row->DatumVremePoc ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
