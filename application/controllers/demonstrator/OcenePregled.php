<?php
 //NV
class OcenePregled extends DemonstratorPage {

    protected $page_title = "Pregled ocena";
   
    protected function rows() {
        
      $data['predmeti'] = $this->Demonstrator_model->getNeaktivniPredmeti();
      
      foreach($data['predmeti'] as $x) {
          $x->podaci = $this->Demonstrator_model->getPodaci($x -> IDOba);
      }

      $this->load->view('ocenjivac/ocene_pregled.php', $data);
       
    }

}

