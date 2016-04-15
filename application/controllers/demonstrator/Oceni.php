<?php

//SD
class Oceni extends DemonstratorPage {

    protected $page_title = "Ocenjivanje zadatka";

    public function index() {
        echo "Invalid ID";
        //echo $nesto;
    }

    public function rows() {
       $this->showOcenjivanje();
    }

    protected function jsscripts() {
        @$data->IDZad = $this->zadatak_id;
        $this->load->view('ocenjivac/ocenjivanje_jsscripts.php', $data);
    }


    
    
    
}
