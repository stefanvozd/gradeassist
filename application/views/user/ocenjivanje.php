
<!-- SD -->
<div class="col-sm-6">
    <div class="box box-color box-bordered">
        <div class="box-title">
            <h3>
                <i class="fa fa-bars"></i>
                Ocenjivanje
            </h3>
            <div class="actions">
                 
                 
                <a href="#" class="btn btn-mini content-slideUp">
                    <i class="fa fa-angle-down"></i>
                </a>
            </div>
        </div>
        <div class="box-content">
            <form id="forma" method="POST" class="form-horizontal form-validate">
            <div id="dd"  class="form-horizontal">
        
                <div class="form-group">
                    <label for="student" class="control-label col-sm-2">Student</label>
                    <div class="col-sm-10">
                        <input disabled name="student" type="text" class="form-control" id="naslov"value="<?php echo @$Ime . " " . @$Prezime; ?>" >
                          <input name="idzad" type="hidden" class="form-control" id="idzad" value="<?php echo @$IDZad;?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="index" class="control-label col-sm-2">Br. Index</label>
                    <div class="col-sm-10">
                        <input disabled name="index" type="text" class="form-control" id="naslov" value="<?php echo @$BrojIndexa; ?>" >

                    </div>
                </div>

           
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
                ?>



                <div class="form-group">
                    <label for="predmet" class="control-label col-sm-2">Status: </label>
                    <div class="col-sm-10">
                        <select   <?php if(UserData::getUserType() == "student" || (@$arhiviran == 1)) echo "disabled"; ?> name="status" type="text" class="form-control  <?php  pringStatusColor(@$status);?>" id="status" >
                            <option    <?php if(@$status == "neocenjen") echo "selected";?>> Neocenjen </option>
                             <option    <?php if(@$status == "ocenjen") echo "selected";?>> Ocenjen </option>
                            <option    <?php if(@$status == "utoku") echo "selected";?>> U toku </option>
                            <option    <?php if(@$status == "disfalifikovan") echo "selected";?>> Disfalifikovan </option>
                            <option    <?php if(@$status == "nijepredao") echo "selected";?>> Nije predao </option>
                        </select>
                    </div>
                </div>



                


                <div class="form-group">
                    <label for="poeni" class="control-label col-sm-2">Poeni </label>
                    <div class="col-sm-10">
                        <input  <?php if(UserData::getUserType() == "student" || (@$arhiviran == 1)) echo "disabled"; ?>  name="poeni" type="number" class="form-control" id="poeni" value="<?php if(  !(UserData::getUserType() == UserData::getStudentType() && (@$arhiviran == 0)))echo @$poeni; ?>" >

                    </div>
                </div>    


                    <div class="form-group">
                    <label for="komentar" class="control-label col-sm-2">Komentar </label>
                    <div class="col-sm-10">
                        <textarea  <?php if(UserData::getUserType() == "student" || (@$arhiviran == 1)) echo "disabled"; ?> rows="17" name="komentar" id="komentar" rows="5" class="form-control"><?php if(  !(UserData::getUserType() == UserData::getStudentType() && (@$arhiviran == 0))) echo @$komentar; ?> </textarea>

                    </div>
                    
                    
                    
                    
                       <?php if(UserData::getZaposlenType() == UserData::getUserType() || UserData::getDemonstratorType() == UserData::getUserType()) { ?>
                    <div class="col-sm-12" style="margin-top: 15px;">
                        <button <?php if(@$arhiviran == 1) echo "disabled";?> id="sacuvaj" class="btn  btn-satblue  pull-right">Sačuvaj</button>
                        
                        <?php if(UserData::getZaposlenType()== UserData::getUserType()) { ?>
                        <button <?php if(@$arhiviran == 1) echo "disabled";?> style="margin-right: 20px;" id="zakljuci" class="btn  btn-satblue  pull-right">Zaključi</button>
                        <?php } ?>
                        
                    </div>
                      <?php } ?>
                    
                </div>    

                
              
         

            </div>







   </form>


        </div>
    </div>
</div>
</div>

</div>






<!-- SD -->