<!--Nikola Maksimovic-->
<div class="row">
    <div class="col-sm-12">
        <div class="calendar"></div>
    </div>
</div>

<script>
    $(document).ready(function(){

    
    if ($(".calendar").length > 0 && !$(".calendar").parent().hasClass("daterangepicker")) {
    var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            
            $('.calendar').fullCalendar({
            lang: 'sr'
        });
            
            $('.calendar').fullCalendar('addEventSource', [


<?php foreach ($obaveze as $obv): ?>
        {
            title:'<?php echo $obv->Naziv ?>',
            url: '<?php echo getBaseURL().UserData::getUserType()."/obaveza/pregled/$obv->IDOba" ?>',
            start:'<?php echo $obv->DatumVremePoc[6] . $obv->DatumVremePoc[7] . $obv->DatumVremePoc[8] . $obv->DatumVremePoc[9] . "-" . $obv->DatumVremePoc[0] . $obv->DatumVremePoc[1] . "-" . $obv->DatumVremePoc[3] . $obv->DatumVremePoc[4] ?>',
            end:'<?php echo $obv->DatumVremeKraj[6] . $obv->DatumVremeKraj[7] . $obv->DatumVremeKraj[8] . $obv->DatumVremeKraj[9] . "-" . $obv->DatumVremeKraj[0] . $obv->DatumVremeKraj[1] . "-" . $obv->DatumVremeKraj[3] . $obv->DatumVremeKraj[4] ?>'
        },
<?php endforeach; ?>

    ]);
    }

    });
</script>