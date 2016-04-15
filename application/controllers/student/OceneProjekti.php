<?php
//Nikola Maksimovic
class OceneProjekti extends StudentPage {

    protected $page_title = "Ocenjeni projekti";

    protected function rows() {
        //$this->load->view('student/oceneprojekti.php');
        $data['rows'] = $this->Student_model->getObaveze(0, 'projekat');
        //$data['ime'] = $this->Student_model->getImePredmeta();
        $data['ocene'] = TRUE;
        $data['tip'] = 'Projekat';

        if (!empty($data))
            $this->load->view('student/projekti.php', $data);
        else {
            //Ne postoji nista
        };
    }

}
