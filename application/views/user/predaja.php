<!-- SD -->

<div class="row">

    <div class="col-sm-6">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="fa fa-bars"></i>
                    Moj projekat 
                </h3>
                <div class="actions">
                     
                    <a href="#" class="btn btn-mini content-slideUp">
                        <i class="fa fa-angle-down"></i>
                    </a>
                </div>
            </div>
            <div class="box-content">
                <div id="formaobj"  class="form-horizontal">
                    <input id="obaveza_id" name="obaveza_id" type="hidden" value="<?php echo $IDOba; ?>"/>
                    <div class="form-group">
                        <label for="naslov" class="control-label col-sm-2">Naslov</label>
                        <div class="col-sm-10">
                            <input disabled name="naslov" type="text" class="form-control" id="naslov"value="<?php echo $Naziv; ?>" >

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="predmet" class="control-label col-sm-2">Predmet</label>
                        <div class="col-sm-10">
                            <select disabled name="predmet" type="text" class="form-control" id="predmet" >
                                <option> <?php echo $IDPre; ?> </option>
                            </select>



                        </div>



                    </div>


                    <div class="form-group">


                        <label for="textfield" class="control-label col-sm-2">Predaja</label>
                        <div class="col-sm-6">
                            <input disabled name="datum" type="text" class="form-control daterangepick active" id="datum" value="<?php $DatumVremeKraj = explode(" ", $DatumVremeKraj);
echo $DatumVremeKraj[0];
?>">
                            <span class="help-block">Datum</span>
                        </div>


                        <div class="col-sm-4">
                            <div class="bootstrap-timepicker">
                                <input type="text" name="vreme" disabled class="form-control " value="<?php echo $DatumVremeKraj[1]; ?>">
                                <span class="help-block">Do</span>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2">Predati fajlovi</label>
                        <div class="col-sm-10">
                            <div class="file-manager"></div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 15px;">

                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>

    
 <?=@$ocenjivanjeview;?> 

    

</div>
