<?php

class Obaveza extends ZaposlenPage {
    //ovo je potrebno da bi se stranici moglo da se pristup    
    
    protected $page_title = "Pregled obaveze";
   

    public function index() {
        parent::index();
    }
    
    
    public function rows() {
        if(isset($this->obaveza_id)) $obaveza = $this->User_model->getObaveza($this->obaveza_id);
        if (!empty($obaveza))
            $this->load->view('user/obaveza.php', $obaveza);
        else {
            $data['obaveze'] = $this->Zaposlen_model->getSveObaveze();
            $this->load->view('zaposlen/sve_obaveze.php',$data);
        };
    }
    
}
