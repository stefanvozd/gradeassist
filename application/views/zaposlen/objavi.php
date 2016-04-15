<!-- SD -->


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
                <form id="formaobj" action="<?php echo current_url() ?>/post" method="POST" class="form-horizontal form-validate">
                    <input id="obaveza_id" name="obaveza_id" type="hidden" value="<?php echo(time()); ?>"/>
                    <div class="form-group">
                        <label for="naslov" class="control-label col-sm-2">Naslov</label>
                        <div class="col-sm-10 controls">
                            <input name="naslov" type="text" class="form-control" id="naslov" data-rule-required="true">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="predmet" class="control-label col-sm-2">Predmet</label>
                        <div class="col-sm-10">
                            <select name="predmet" type="text" class="form-control" id="predmet" data-rule-required="true" aria-required="true">
                                <option value> Izaberite predmet</option>
                                <?php
                                foreach ($obaveza as $row) {
                                    echo '<option value="' . strtoupper($row['IDPre']) . '">' . strtoupper($row['IDPre']) . '</option>';
                                }
                                ?>
                            </select>



                        </div>



                    </div>
                    <div class="form-group">
                        <label for="file" class="control-label col-sm-2 controls">Zadatak</label>
                        <div class="col-sm-10">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div id="tekstupload" class="input-group">
                                    <div  class="form-control" data-trigger="fileinput">
                                        <span id="tekstfile" class="fileinput-filename"></span>
                                    </div>
                                    <span class="input-group-addon btn btn-primary btn-file">
                                        <span class="fileinput-new">Izaberi PDF</span>
                                        <input type="file" name="...">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="textfield" class="control-label col-sm-2">Predaja</label>
                        <div class="col-sm-6">
                            <input name="datum" type="text" class="form-control daterangepick active" id="datum" value="">
                            <span class="help-block">Datum</span>
                        </div>


                        <div class="col-sm-4">
                            <div class="bootstrap-timepicker">
                                <input type="text" name="vreme" id="timepicker" class="form-control timepick">
                                <span class="help-block">Do</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Opcije</label>
                       -<div class="col-sm-5">
                            <div class="radio">
                                <label>
                                 
<input type="radio" name="tip" value="projekat">
                                    Projekat </label>  
                                &nbsp;
                                <label>
                                 
<input type="radio" name="tip" value="lab">
                                    Lab. vežba </label> </div>
                           

                        </div>
                     
                    </div>  
                    

                    <div class="form-group">
                        <label for="textarea" class="control-label col-sm-2">Obaveštenje</label>
                        <div class="col-sm-10">
                            <textarea name="obavestenje" id="obavestenje" rows="9" class="form-control"></textarea>		
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label class="control-label col-sm-2">Dodatni fajlovi</label>
                        <div class="col-sm-10">
                            <div class="plupload" id="uploader" style="position: relative;">
                                <div class="plupload_wrapper plupload_scroll">
                                    <div id="o_19jh5022qggn1ijn1odtaqm19rt1_container" class="plupload_container" title="Using runtime: html5">
                                        <div class="plupload"><div class="plupload_content"><div class="plupload_filelist_header">
                                            <div class="plupload_file_name">Filename</div>
                                            <div class="plupload_file_action">&nbsp;</div>
                                            <div class="plupload_file_status"><span>Status</span></div>
                                            <div class="plupload_file_size">Size</div><div class="plupload_clearer">&nbsp;</div>
                                            </div>
                                            <ul id="o_19jh5022qggn1ijn1odtaqm19rt1_filelist" class="plupload_filelist" style="position: relative;">
                                                <li class="plupload_droptext">Dodajte fajlove ovde</li>
                                            </ul>
                                            <div class="plupload_filelist_footer">
                                            <div class="plupload_file_name">
                                            <div class="plupload_buttons"><a href="#" class="btn plupload_add btn-primary" id="o_19jh5022qggn1ijn1odtaqm19rt1_browse" style="position: relative; z-index: 1;"><i class="fa fa-plus-circle"></i> Add Files</a><a href="#" class="btn plupload_start btn-success plupload_disabled"><i class="fa fa-cloud-upload"></i> Start Upload</a></div><span class="plupload_upload_status"></span></div><div class="plupload_file_action"></div><div class="plupload_file_status"><span class="plupload_total_status">0%</span></div><div class="plupload_file_size"><span class="plupload_total_file_size">0 b</span></div><div class="plupload_progress"><div class="plupload_progress_container progress progress-striped"><div class="plupload_progress_bar bar"></div></div></div><div class="plupload_clearer">&nbsp;</div></div></div></div></div><input type="hidden" id="o_19jh5022qggn1ijn1odtaqm19rt1_count" name="o_19jh5022qggn1ijn1odtaqm19rt1_count" value="0"></div><div id="html5_19jh502308361n80ham1khefa54_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 194px; left: 8px; width: 92px; height: 30px; overflow: hidden; z-index: 0;"><input id="html5_19jh502308361n80ham1khefa54" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" multiple="" accept="image/jpeg,image/gif,image/png,application/zip"></div></div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 15px;">
                            <button  id="subobj" class="btn  btn-satblue  pull-right">Objavi i obavesti</button>
                        </div>
                    </div>


  
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="box">
 
            <div class="box-content">

                <div id="status" class="status"></div>


            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        var frm = $('#formaobj');
        frm.submit(function (ev) {
            $.ajax({
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: frm.serialize(),
                success: function (data) {
                   
                    if (data) {
                        $("#subobj").removeClass("btn-lightgrey").addClass("btn-success");
                        $("#subobj").html('<i class="glyphicon-ok_2"></i> Uspesno!');

                        setTimeout(function () {
                            window.location.href = "./"; //will redirect to your blog page (an ex: blog.html)
                        }, 1000); //will call the function after 2 secs.

                      
                    } else {
                        $("#subobj").removeClass("btn-lightgrey").addClass("btn-danger");
                        $("#subobj").html('Ponovi objavu');
                    }
                    
                }
            });

            $("#subobj").removeClass("btn-satblue").addClass("btn-lightgrey");
            $("#subobj").html('<i class="glyphicon-roundabout"></i> Objava...');
            //  $("#subobj").hide();
            ev.preventDefault();
        });





        var file_type = '';
        var obid = $("#obaveza_id").val();
        var btnUpload = $('#tekstupload');
        var status = $('.status');
        new AjaxUpload(btnUpload, {
            action: "./objavi/upload_tekst/" + obid,
            //Name of the file input box
            name: 'uploadfile',
            onSubmit: function (file, ext) {
                file_type = ext;
                status.html('Učitavam....');
                var glip = ' <i class="glyphicon-file "></i>';
                $("#tekstfile").html(glip + " &nbsp " + file);

            },
            onComplete: function (file, response) {
                var file_path = "";

                var myPDF = new PDFObject({
                    url: '<?php echo getBaseURL(); ?>/files/obaveza/' + obid + '/tekst_zadatka.pdf',
                    width: "100%",
                    height: "865px"


                }).embed('status');

                // Be sure your document contains an element with the ID 'status' 

                //On completion clear the status
                //   status.html('');
                //Add uploaded file to list
                if (response === "upload_error") {
                    alert("Error in upload");
                } else {

                    var imgHtml = '<br /><br /><div><img src="uploads/' + response + '" /></div>';

                    $("#images").append(imgHtml);
                }
            }
        });

    });



</script>
