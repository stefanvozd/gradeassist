
<script type="text/javascript">

//jQuery za progress_bar.php
  $('[data-countdown]').each(function() {
   var startTime = new Date($(this).html()).getTime();
   var currentTime = new Date().getTime();
   var $this = $(this), finalDate = $(this).data('countdown');
   var endTime = new Date(finalDate).getTime();

   var percentage = Math.round((currentTime - startTime) / (endTime - startTime) * 100);
   $(this).parents(".col-sm-12").find('.progress-bar').css('width', percentage + '%');
   
   $this.countdown(finalDate, function(event) {
    $this.html(event.strftime('%D dana %H:%M:%S'));
   })
   .on('finish.countdown', function(event) {
        $.ajax({
                 type: "POST",
                 url: '<?php echo getBaseURL().UserData::getUserType(); ?>/home/setNeaktivnaObaveza',
                 data: {id : $(this).data('obaveza')} 
             });
             //AJAX success f-ja zeza, komandu ispod radimo svakako.
        $(this).parents(".col-sm-12").remove();
    });
 });

    </script>
    
    