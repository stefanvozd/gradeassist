<?php
//nikola Maksimovic
class Arhiva extends ZaposlenPage {

    protected $page_title = "Arhiva";

     //Postavljamo da je tab active, posto se trenutno na njemu nalazimo
    protected function nav_tab1() {
       $data['active']=false;
       $this->load->view('ocenjivac/nav_tab1.php',$data);
    }
   
    protected function rows() {
       //$this->load->view('user/arhiva.php');
       $data['arhiva'] = $this->User_model->getArhivaForZap();
       
        if (!empty($data))
            $this->load->view('user/arhiva.php', $data);
        else {
           // ne postoji nista
        };
    }
    
}
