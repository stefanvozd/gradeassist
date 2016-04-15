<?php
//Nikola Maksimovic
class Projekti  extends StudentPage {
    protected $page_title = "Aktivni projekti";
    
     protected function rows() {
       //$this->load->view('student/projekti.php');
       $data['rows'] = $this->Student_model->getObaveze(1,'projekat');
       $data['tip'] = 'projekat';
       //$data['ime'] = $this->Student_model->getImePredmeta();
       
       if (!empty($data))
            $this->load->view('student/projekti.php', $data);
        else {
            // ne postoji nista
        };
    }
       
}