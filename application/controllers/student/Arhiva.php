<?php
//Nikola Maksimovic
class Arhiva  extends StudentPage { 
    protected $page_title= "Arhiva";
    
    protected function rows() {
       $data['arhiva'] = $this->User_model->getArhiva();
       
        if (!empty($data))
            $this->load->view('user/arhiva.php', $data);
        else {
           //ne postoji nista u bazi
        };
    }
}   

