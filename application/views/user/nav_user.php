<div class="user">
      <div class="dropdown"> <a href="#"> <?php echo UserData::getUserName();?> <img src="<?php echo getAssetsUrl();?>img/demo/user-avatar.jpg" alt=""> </a>
      </div>
         <ul class="icon-nav">
            <li class="dropdown sett">
              <a rel="tooltip" data-placement="bottom" title="" data-original-title="Odjava" href="<?php echo getBaseURL().UserData::getUserType().'/home/logout' ?>">
                <i class="fa fa-sign-out"></i>
              </a>
            </li>
        </ul>
    </div>

