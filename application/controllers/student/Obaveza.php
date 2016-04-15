<?php

class Obaveza extends StudentPage {
    //ovo je potrebno da bi se stranici moglo da se pristup    
    
    protected $page_title = "Pregled obaveze";
   

    public function index() {
        echo "Invalid ID";
    }
    
    
    public function rows() {
        $obaveza = $this->User_model->getObaveza($this->obaveza_id);
        if (!empty($obaveza))
            $this->load->view('user/obaveza.php', $obaveza);
        else {
            //Ako ne postoji dati id 
        };
    }
    
    
    
    
    
    
}
