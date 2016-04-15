<?php
//Nikola Maksimovic
class Kalendar  extends DemonstratorPage { 
    protected $page_title= "Kalendar";
    
    //protected function rows() {
       //$this->load->view('student/kalendar.php');
       //$data['arhiva'] = $this->User_model->getArhiva();
       
        //if (!empty($data))
          //  $this->load->view('user/arhiva.php', $data);
        //else {
           // $this->load->view('user/nav_user.php');
        //};
    
    
    protected function rows() {
        
        $data['obaveze'] = $this->Student_model->getKalendarDemonstrator(); 

        $this->load->view('user/kalendar.php', $data);
    }
    
     public function calendar(){
         $this->load->library('fullcalendar_lib');
    }
   
}   
