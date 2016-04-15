<?php

class Home  extends AdminPage { 

   protected $page_title= "Glavna";
    
    
   protected function rows(){
   	$this->load->view('template/rows.php');
   }
}   