<?php

//SD
class Predaja extends StudentPage {
    //ovo je potrebno da bi se stranici moglo da se pristup    
    
    protected $page_title = "Predaja projekta";
   

    public function index() {
        echo "Invalid ID";
        //echo $nesto;
    }
    
    
    

        public function rows() {
       $zadatak = $this->Student_model->getZadatak($this->obaveza_id,  UserData::getUserID());

        
        @$data2 = $this->Student_model->getStudent($zadatak->IDStu);
        @$data2->IDZad = $zadatak->IDZad;
        @$data2->poeni = $zadatak->Poeni;
        @$data2->komentar = $zadatak->Komentar;
        @$data2->status = $zadatak->Status;
        @$data2->arhiviran = $zadatak->Arhiviran;
        
        
        $data = $this->User_model->getObaveza($this->obaveza_id);
        $data->ocenjivanjeview = $this->load->view('user/ocenjivanje.php', $data2, TRUE);
        
        $this->load->view('user/predaja.php', $data);
    }
    
    
        public function obaveza($id) {
        if (!isset($id)) {
            echo "Invalid ID";
            return;
        }
        $this->obaveza_id = $id;
        parent::index();
    }
    
    protected function jsscripts() {
      $this->load->view('student/predaja_jsscripts.php');
    }
    
    
    
    
    public function predaja_files_init($id) {


        if (!file_exists(realpath(APPPATH . '../files/studentski_zadaci/' . $id . '/' . UserData::getUserID()))) {
            $this->Student_model->sacuvajZadatak($id);
            mkdir('files/studentski_zadaci/' . $id . '/' . UserData::getUserID(), 0777, true);
        }
        
        $obaveza = $this->Student_model->getObaveza($id);
 
        
        $locked = false;
        $write = true;
        
        $obaveza->DatumVremeKraj;
        $time = strtotime($obaveza->DatumVremeKraj);
   
       $curtime = time();


       if (($time- $curtime) <=0) {     
           $locked = true;
           $write = false;
        }


        //if vreme isteklo
        //locket = true
        //write = false

        $this->load->helper('path');
        $opts = array(
            // 'debug' => true, 
            'roots' => array(
                array(
                    'driver' => 'LocalFileSystem',
                    'path' => realpath(APPPATH . '../files/studentski_zadaci/' . $id . '/' . UserData::getUserID()),
                    'URL' => base_url('files/studentski_zadaci/' . $id . '/' . UserData::getUserID()) . '/',
                    'accessControl' => 'access', // disable and hide dot starting files (OPTIONAL)
                    'attributes' => array(
                        array(
                            'pattern' => '!^/*.*$!',
                            'read' => true,
                            'write' => $write,
                            'locked' => $locked
                        )
                    ),
                )
            )
        );

        $this->load->library('elfinder_lib', $opts);
    }

}
