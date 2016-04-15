<div class="row">

    <div class="col-sm-6">
        <div class="box box-color box-bordered">
            <div class="box-title">
                <h3>
                    <i class="fa fa-bars"></i>
                    Projekat 
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
                  <!--  <div class="form-group">
                        <label for="file" class="control-label col-sm-2">Zadatak</label>
                        <div class="col-sm-10">
                            <button onclick="location.href = '../download/' + <?php echo $IDOba ?> + ''" class="btn btn btn-lightgrey btn--icon">
                                <i class="fa fa-download"></i>Preuzmi
                            </button>
                            tekst_zadatka.pdf

                        </div>
                    </div> -->

                    <div class="form-group">


                        <label for="textfield" class="control-label col-sm-2">Predaja</label>
                        <div class="col-sm-6">
                            <input disabled name="datum" type="text" class="form-control daterangepick active" id="datum" value="<?php $DatumVremeKraj = explode(" ", $DatumVremeKraj);
echo $DatumVremeKraj[0]; ?>">
                            <span class="help-block">Datum</span>
                        </div>


                        <div class="col-sm-4">
                            <div class="bootstrap-timepicker">
                                <input type="text" name="vreme" disabled class="form-control " value="<?php if(isset($DatumVremeKraj[1])) echo $DatumVremeKraj[1]; ?>">
                                <span class="help-block">Do</span>
                            </div>
                        </div>
                    </div>




                

                    <div class="form-group">
                        <label for="textarea" class="control-label col-sm-2">Obaveštenje</label>
                        <div class="col-sm-10">
                            <textarea disabled name="obavestenje" id="obavestenje" rows="9" class="form-control"><?php echo $Obavestenje; ?></textarea>		
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label class="control-label col-sm-2">Dodatni fajlovi</label>
                        <div class="col-sm-10">
                            <div class="file-manager"></div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 15px;">

                        </div>
                    </div>


                    <!--   	<div class="form-actions">
                                                                   <button type="submit" class="btn btn-primary">Save changes</button>
                                                                   <button type="button" class="btn">Cancel</button>
                                                           </div>-->


                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box">
            <!--<div class="box-title">
                    <h3>
                            <i class="fa fa-bars"></i>
                            Projektni zadatak
                    </h3>
                    <div class="actions">
                            <a href="#" class="btn btn-mini content-refresh">
                                    <i class="fa fa-refresh"></i>
                            </a>
                            <a href="#" class="btn btn-mini content-remove">
                                    <i class="fa fa-times"></i>
                            </a>
                            <a href="#" class="btn btn-mini content-slideUp">
                                    <i class="fa fa-angle-down"></i>
                            </a>
                    </div>
            </div>-->
            <div class="box-content">

                <div id="status" class="status"></div>


            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        var myPDF = new PDFObject({
            url: '<?php echo getBaseURL(); ?>/files/obaveza/' + <?php echo $IDOba ?> + '/tekst_zadatka.pdf',
            width: "100%",
            height: "1000px"


        }).embed('status');

	// file_management
	if ($('.file-manager').length > 0) {
		$('.file-manager').elfinder({
			url: '<?php echo getBaseURL().UserData::getUserType(); ?>/obaveza/obaveza_files_init/<?php echo $IDOba ?>',
                        defaultView : 'list',
                        lang: 'sr',
                        resizable : false,
                                        getFileCallback: function (file) {
                      var ext = file.name.split('.').pop();
                      if(ext == "css" || ext == "sql" || ext == "cs" || ext == "json" || ext == "cpp" || ext == "c" || ext == "html" ||ext == "xml" ||ext == "py" ||ext == "java" || ext == "txt" ){
                        $.get(file.url, function(data) {
                                              $("#kod").html(data);
                                              $('pre code').each(function(i, block) {
                                                hljs.highlightBlock(block);
                                                hljs.fixMarkup(true);
                                               });
                                               $('#modal').modal('toggle');
                         });
                     }
       
                },
                        uiOptions : {
    // toolbar configuration
    toolbar : [  
    ],

    // directories tree options
    tree : {
        // expand current root on init
        openRootOnLoad : true,
        // auto load current dir parents
        syncTree : true
    },

    // current working directory options
    cwd : {
        // display parent directory in listing as ".."
        oldSchool : true
    }
}
                        
		});
	}

    });
    

</script>