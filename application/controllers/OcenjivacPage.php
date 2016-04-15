<?php

//SD
class OcenjivacPage extends UserPage {

    protected $zadatak_id = "";

    protected function getPageType() {
        return "ocenjivac";
    }

    protected function nav_tab1() {
        $this->load->view('ocenjivac/nav_tab1.php');
    }

    protected function nav_tab2() {
        $this->load->view('ocenjivac/nav_tab2.php');
    }

    protected function nav_tab3() {
        $this->load->view('ocenjivac/nav_tab3.php');
    }

    protected function left() {
        $this->load->view('ocenjivac/left.php');
    }

    public function ocenjivanje_files_init($id) { 
        $zadatak = $this->Zaposlen_model->getZadatak($id);
        
        $this->load->helper('path');
        $opts = array(
            // 'debug' => true, 
            'roots' => array(
                array(
                    'driver' => 'LocalFileSystem',
                    'path' => realpath(APPPATH . '../files/studentski_zadaci/' . $zadatak->IDOba . '/' . $zadatak->IDStu),
                    'URL' => base_url('files/studentski_zadaci/' . $zadatak->IDOba . '/' . $zadatak->IDStu) . '/',
                    'accessControl' => 'access', // disable and hide dot starting files (OPTIONAL)
                    'attributes' => array(
                        array(
                            'pattern' => '!^/*.*$!',
                            'read' => true,
                            'write' => true,
                            'locked' => true
                        )
                    ),
                )
            )
        );

        $this->load->library('elfinder_lib', $opts);
    }    
    
    public function oceni_sacuvaj(){
         $IDZad = $this->input->post('idzad');
         $status = $this->input->post('status');
         $poeni = $this->input->post('poeni');
         $komentar = $this->input->post('komentar');
         
         $status = preg_replace('/\s*/', '', $status);

        $status = strtolower($status);
         
         echo $this->Zaposlen_model->sacuvajOcenu($IDZad, $status, $poeni, $komentar);
    }        
    
    protected function showOcenjivanje(){
         $zadatak = $this->Zaposlen_model->getZadatak($this->zadatak_id);
        
        $data2 = $this->Student_model->getStudent($zadatak->IDStu);
        $data2->IDZad = $this->zadatak_id;
        $data2->poeni = $zadatak->Poeni;
        $data2->komentar = $zadatak->Komentar;
        $data2->status = $zadatak->Status;
        $data2->arhiviran = $zadatak->Arhiviran;
        
        
        $data = $this->User_model->getObaveza($zadatak->IDOba);
        $data->ocenjivanjeview = $this->load->view('user/ocenjivanje.php', $data2, TRUE);
        $this->load->view('user/predaja.php', $data);
    }      
    
    public function zadatak($id) {
        if (!isset($id)) {
            echo "Invalid ID";
            return;
        }

        $this->zadatak_id = $id;
        parent::index();
    }
    
    
        public function download_zadatak($id) {
            $this->load->library('zip');

            $zadatak = $this->Zaposlen_model->getZadatak($id);
            
            $path = "files/studentski_zadaci/$zadatak->IDOba/$zadatak->IDStu/";
      
            $this->zip->read_dir($path,FALSE);  
          
            ob_end_clean();
            $this->zip->download("$zadatak->IDStu - $zadatak->IDOba.zip"); 
            //http://localhost/ga/zaposlen/home/download_zadatak/1432749741
    }

}
