<?php

class Home extends ZaposlenPage {

    protected $page_title = "Nastava";

     //Postavljamo da je tab active, posto se trenutno na njemu nalazimo
    protected function nav_tab1() {
       $data['active']=false;
       $this->load->view('ocenjivac/nav_tab1.php',$data);
    }
   

    
    
}
