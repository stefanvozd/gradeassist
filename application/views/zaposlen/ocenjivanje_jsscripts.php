
<script>


   //AKO PROFESOR NESTO MENJA
   //MORA PRVO DA SACUVA 
   //DA NE BI ZAKLJUCIO OCENU KOJA NIJE SACUVANA
   //A ONDA NEMA NAZAD SEM DA SE MENJA U BAZI
   
   $("#status").focus(function () {
           $("#zakljuci").prop('disabled', true);
    });
    
    $("#poeni").focus(function () {
           $("#zakljuci").prop('disabled', true);
    });
    
     $("#komentar").focus(function () {
           $("#zakljuci").prop('disabled', true);
    });
    
    

        //SD
        $("#zakljuci").click(function () {
              $("#zakljuci").removeClass("btn-satblue").addClass("btn-lightgrey");
            $("#zakljuci").html('<i class="glyphicon-roundabout"></i> Zakljuši...');
            
            $.ajax({
                type: "POST",
                url: '<?php echo getBaseURL().UserData::getUserType(); ?>/oceni/oceni_zakljuci/<?php ?>',
                data: $("#forma").serialize(), // serializes the form's elements.
                success: function (data)
                {
                     if (data == "1") {
                        $("#zakljuci").removeClass("btn-lightgrey").addClass("btn-success");
                        $("#zakljuci").html('<i class="glyphicon-ok_2"></i> Zaključeno');

                        setTimeout(function () {
                          location.href = location.href;
                        }, 1000); //will call the function after 2 secs.

                      
                    } else {
                        $("#zakljuci").removeClass("btn-lightgrey").addClass("btn-danger");
                        $("#zakljuci").html('Nije zaključeno');
                    }
                }
            });

            return false; // avoid to execute the actual submit of the form.
        });
      



</script>