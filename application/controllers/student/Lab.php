<?php
//Nikola Maksimovic
class Lab extends StudentPage {

    protected $page_title = "Predstojeće laboratorijske vežbe";

    protected function rows() {
        
        $data['rows'] = $this->Student_model->getObaveze(1,'lab');
        $data['tip'] =  'lab';

        if (!empty($data))
            $this->load->view('student/projekti.php', $data);
        else {
            //ako nema nista u bazi, posle!!!
            //$this->load->view('student/lab.php', $data);
        };
    }

}
