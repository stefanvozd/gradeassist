<?php
//Nikola Maksimovic
class OceneLab extends StudentPage {

    protected $page_title = "Ocenjene laboratorijske vezbe";

    protected function rows() {
        //$this->load->view('student/ocenelab.php');
        $data['rows'] = $this->Student_model->getObaveze(0,'lab');
        //$data['ime'] = $this->Student_model->getImePredmeta();
        $data['ocene'] = TRUE;
        $data['tip'] = 'lab';

        if (!empty($data))
            $this->load->view('student/projekti.php', $data);
        else {
            // ne postoji nista
        };
    }

}
