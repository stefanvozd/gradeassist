<?php

class ZaposlenPage extends OcenjivacPage {

    protected function getPageType() {
        return "zaposlen";
    }
    
    protected function nav_tab4() {
        $this->load->view('zaposlen/nav_tab4.php');
    }

    protected function nav_tab5() {
        $this->load->view('zaposlen/nav_tab5.php');
    }

      protected function left() {
        $this->load->view('zaposlen/left.php');
        parent::left();
    }
    
   
    
        public function oceni_zakljuci(){
        
         $IDZad = $this->input->post('idzad');
         echo $this->Zaposlen_model->zakljuciOcenu($IDZad);
         
         }

}
