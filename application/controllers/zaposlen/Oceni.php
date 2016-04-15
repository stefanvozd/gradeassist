<?php

//SD
class Oceni extends ZaposlenPage {

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
        $this->load->view('zaposlen/ocenjivanje_jsscripts.php', $data);
    }
    
    function pregled($id){
        $data['rows'] = $this->Zaposlen_model->getPodaci($id);
        $this->load->view('ocenjivac/ocenjivanje.php', $data);
    }
}
