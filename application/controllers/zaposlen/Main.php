<?php

class Main extends CI_Controller {

    //Nemam drugog nacina za default preusmeravanje...
    public function index() {
        redirect(current_url() . '/home');
    }

}


