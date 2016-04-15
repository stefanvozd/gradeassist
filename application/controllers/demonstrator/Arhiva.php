<?php
//Nikola Maksimovic
class Arhiva  extends DemonstratorPage { 
    protected $page_title= "Arhiva";
    
    protected function rows() {
       //$this->load->view('user/arhiva.php');
       $data['arhiva'] = $this->User_model->getArhiva();
       
        if (!empty($data))
            $this->load->view('user/arhiva.php', $data);
        else {
           //ne postoji nista u bazi
        };
    }
}   

