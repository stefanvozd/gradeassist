<?php
//NV
class OcenePregled extends ZaposlenPage {

    protected $page_title = "Pregled ocena";

    protected function rows() {
      
        $data['predmeti'] = $this->Zaposlen_model->getNeaktivniPredmeti();

        foreach($data['predmeti'] as $x) {
            $x->podaci = $this->Zaposlen_model->getPodaci($x -> IDOba);
        }

        $this->load->view('ocenjivac/ocene_pregled.php', $data);
        
    }
    
}

