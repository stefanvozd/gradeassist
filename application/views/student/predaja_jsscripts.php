
<script>

    $(document).ready(function () {

        // file_management
        if ($('.file-manager').length > 0) {
            $('.file-manager').elfinder({
                url: '<?php echo getBaseURL().UserData::getUserType(); ?>/predaja/predaja_files_init/<?php echo $IDOba ?>',
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