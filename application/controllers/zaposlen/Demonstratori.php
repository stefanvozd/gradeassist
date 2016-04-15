<?php
//NV
class Demonstratori extends ZaposlenPage {

    protected $page_title = "Demonstratori";

    protected function rows() {
        
        $data['demonstratori'] = $this->Demonstrator_model->getListaDemonstratora();
        
        $this->load->view('zaposlen/demonstratori.php', $data);
    }
}
