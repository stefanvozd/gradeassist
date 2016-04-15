
<script>
    //SD
    $(document).ready(function () {

        $("#sacuvaj").click(function () {
            $("#sacuvaj").removeClass("btn-satblue").addClass("btn-lightgrey");
            $("#sacuvaj").html('<i class="glyphicon-roundabout"></i> Sačuvaj...');
            
            $.ajax({
                type: "POST",
                url: '<?php echo getBaseURL().UserData::getUserType(); ?>/oceni/oceni_sacuvaj/<?php ?>',
                data: $("#forma").serialize(), // serializes the form's elements.
                success: function (data)
                {
                     if (data == "1") {
                        $("#sacuvaj").removeClass("btn-lightgrey").addClass("btn-success");
                        $("#sacuvaj").html('<i class="glyphicon-ok_2"></i> Sačuvano');
                        $("#zakljuci").prop('disabled', false);

                        setTimeout(function () {
                          location.href = location.href;
                        }, 1000); //will call the function after 2 secs.

                      
                    } else {
                        $("#sacuvaj").removeClass("btn-lightgrey").addClass("btn-danger");
                        $("#sacuvaj").html('Nije sačuvano');
                    }
                }
            });

            return false; // avoid to execute the actual submit of the form.
       
            
        });



        //SD
        // file_management
        if ($('.file-manager').length > 0) {
            $('.file-manager').elfinder({
                url: '<?php echo getBaseURL().UserData::getUserType(); ?>/oceni/ocenjivanje_files_init/<?php echo $IDZad; ?>',
                defaultView: 'list',
                 lang: 'sr',
                resizable: false,
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
                uiOptions: {
                    // toolbar configuration
                    toolbar: [
                    ],
                    // directories tree options
                    tree: {
                        // expand current root on init
                        openRootOnLoad: true,
                        // auto load current dir parents
                        syncTree: true
                    },
                    // current working directory options
                    cwd: {
                        // display parent directory in listing as ".."
                        oldSchool: true
                    }
                }

            });
        }

    });


</script>