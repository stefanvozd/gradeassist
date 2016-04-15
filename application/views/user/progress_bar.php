<?php
    $ocenjivac = FALSE;
  if(!strcmp(UserData::getUserType(), 'student')) {
      $detaljan_pregled = '/obaveza/pregled/';
      $akcija = '/predaja/obaveza/';
  } else {
      $detaljan_pregled = '/obaveza/pregled/';
      $akcija = '/ocenepregled/';
      $ocenjivac = TRUE;
  }

?>
<div class="row">
  <?php if($ocenjivac):
      foreach($neaktivne as $row): ?>
        <div class="col-sm-12">
          <div class="box box-bordered">
            <div class="box-title">
              <h3> <i class="fa fa-bar-chart-o"></i> <?php echo strtoupper($row->IDPre); ?> </h3>
              <div class="actions">
                  <a rel="tooltip" data-original-title="Ocenjivanje" href="<?php echo getBaseURL().UserData::getUserType().$akcija; ?>" class="btn btn-mini">
                      <i class="fa fa-check"></i>
                  </a>
                  <a rel="tooltip" data-original-title="Detaljnije" href="<?php echo getBaseURL().UserData::getUserType().$detaljan_pregled.$row->IDOba; ?>" class="btn btn-mini">
                      <i class="fa fa-info-circle"></i>
                  </a>
                  <a href="#" class="btn btn-mini content-slideUp"> <i class="fa fa-angle-down"></i> </a> </div>
            </div>
            <div class="box-content">
              <div class="statistic-big">
                <div class="top">
                  <h4><a href="<?php echo getBaseURL().UserData::getUserType().$detaljan_pregled.$row->IDOba; ?>"><?php echo $row->Naziv; ?></a></h4>
                </div>
                <div class="bottom ">
                  <div class="progress">
                    <div class="progress-bar progress-bar-success " role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%" > <span class="sr-only"></span> </div>
                  </div>
                </div>
                <div class="bottom">
                  <ul class="stats-overview">
                    <li  class="alert-success" >
                        <a href="<?php echo getBaseURL().UserData::getUserType().$akcija; ?>">
                            <span class="name" > Ocenjivanje </span>
                        </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach;
  endif; ?>
  <?php foreach($rows as $row): ?>
        <div class="col-sm-12">
          <div class="box box-bordered">
            <div class="box-title">
              <h3> <i class="fa fa-bar-chart-o"></i> <?php echo strtoupper($row->IDPre); ?> </h3>
              <div class="actions">
            <?php if(!$ocenjivac && strcmp($row->Tip, 'lab')): ?>
                  <a rel="tooltip" data-original-title="Predaj" href="<?php echo getBaseURL().UserData::getUserType().$akcija.$row->IDOba; ?>" class="btn btn-mini">
                      <i class="fa fa-upload"></i>
                  </a>
            <?php endif; ?>
                  <a rel="tooltip" data-original-title="Detaljnije" href="<?php echo getBaseURL().UserData::getUserType().$detaljan_pregled.$row->IDOba; ?>" class="btn btn-mini">
                      <i class="fa fa-info-circle"></i>
                  </a>
                  <a href="#" class="btn btn-mini content-slideUp"> <i class="fa fa-angle-down"></i> </a> </div>
            </div>
            <div class="box-content">
              <div class="statistic-big">
                <div class="top">
                  <h4><a href="<?php echo getBaseURL().UserData::getUserType().$detaljan_pregled.$row->IDOba; ?>"><?php echo $row->Naziv; ?></a></h4>
                </div>
                <div class="bottom ">
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger " role="progressbar" aria-valuemin="0" aria-valuemax="100" > <span class="sr-only"></span> </div>
                  </div>
                </div>
                <div class="bottom">
                  <ul class="stats-overview">
                    <li  class="alert-danger" > <span class="name" > Preostalo vreme </span> <span class="clock" data-obaveza='<?php echo $row->IDOba; ?>' data-countdown='<?php echo $row->DatumVremeKraj; ?>'><?php echo $row->DatumVremePoc; ?></span> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
  <?php endforeach; ?>
</div>