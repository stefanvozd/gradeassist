<?php

class UserPage extends Page {

    protected $obaveza_id = 0;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if (UserData::isLoggedIn()) {
            //Ukoliko je korisnik vec ulogovan, a pokusa da pristupi tudjem modulu, prebacujemo ga na odgovarajucu stranicu
            if ($this->getPageType() != UserData::getUserType())
                redirect(getBaseURL() . UserData::getUserType(), 'refresh');

            //Prikazi stranicu
            parent::index();
            return;
        } else {

            //Prikazuje nam login ekran ukoliko korisnik vec nije ulogovan
            $this->load->helper(array('form'));
            $this->showUserLoginView();
        }
    }
    function pw($pass = "password"){
        echo hash('sha256', $pass);
    }
    //Ukoliko korisnik moze da se uloguje prebacujemo ga odgovarajucu stranicu
    //U suprutnom vraca se "false" (za AJAX zahtev)
    public function login() {

        if (UserData::isLoggedIn())
            redirect(getBaseURL() . UserData::getUserType(), 'refresh');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'Id', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
        //TODO proveriti validaciju i f-ju set_rules; LOGOVANJE

        if ($this->form_validation->run() == FALSE) {
            //Ukoliko login nije moguc vraca false , dalje preuzimaju AJAX i JS
            echo false;
        } else {

            $id = $this->input->post('id');
            $password = hash('sha256', $this->input->post('password'));
            //na osnovu tipa strane vrsi upit u odgovarajucoj tabeli
            $result = $this->Login_model->login($this->getPageType(), $id, $password);

            if ($result) {
                UserData::setUserID($id);
                UserData::setUserName($result[0]['Ime'] . " " . $result[0]['Prezime']);
                UserData::setUserType($this->getPageType());
                UserData::setLoggedIn();

                echo true;
                // redirect i exit() nemaju efekta jer se login() vraca svom pozivaocu (jQuery)
                // redirect(getBaseURL() . UserData::getUserType(), 'refresh');
                // exit();
            }

            echo false;
        }
    }

    public function logout() {
        $redirect = getBaseURL() . UserData::getUserType();
        if (UserData::isLoggedIn())
            UserData::logOut();
        redirect($redirect, 'refresh');
    }

    //Ovde ce uci samo ako postoji kontroler, samim tim se ne moze ukucati bilo sta u url :)
    function showUserLoginView() {
        $data['getPageType'] = $this->getPageType();
        $this->load->view('template/login.php', $data);
    }

    protected function nav_user() {
        $this->load->view('user/nav_user.php');
    }
    //pregled obaveza
    public function pregled($id = NULL) {
        $this->obaveza_id = $id;
        parent::index();
    }

    public function download($id) {
        $this->load->helper('download');

        $obaveza = $this->User_model->getObaveza($id);

        if (empty($obaveza))
            echo "Fajl ne postoji.";
        return;
        $path = "files/obaveza/" . $id . "/tekst_zadatka.pdf";
        $data = file_get_contents($path); // Read the file's contents
        force_download($obaveza->Naziv . ".pdf", $data);
    }

    public function obaveza_files_init($id) {
        $this->load->helper('path');
        $opts = array(
            // 'debug' => true, 
            'roots' => array(
                array(
                    'driver' => 'LocalFileSystem',
                    'path' => set_realpath(realpath(APPPATH . '../files/obaveza/' . $id . '/')),
                    'URL' => base_url('files/obaveza/' . $id) . '/',
                    'accessControl' => 'access', // disable and hide dot starting files (OPTIONAL)
                    'attributes' => array(
                        array(
                            'pattern' => '!^/*.*$!',
                            'read' => true,
                            'write' => true,
                            'locked' => false
                        )
                    ),
                )
            )
        );

        $this->load->library('elfinder_lib', $opts);
    }
    
    //Student, Zaposlen, Demonstrator dobijaju na glavnoj strani progress bar
    protected function rows(){
        $model_name = ucfirst(UserData::getUserType()).'_model'; //e.g. Student_model
        $this -> load -> model ($model_name, 'model'); //preimenujemo radi uniformnog koriscenja
        $data['rows'] = $this->model->getObaveze(); //pozivamo f-ju odgovarajuceg modela
        
        //za ocenjivace uzimamo i neaktivne
        if(strcmp(UserData::getUserType(), 'student')){
            //TODO jedan upit, pa podela na 2 niza?
            $data['neaktivne'] = $this->model->getNeaktivneObaveze();
        }

        $this -> load -> view('user/progress_bar.php',$data);
    }
    
    function setNeaktivnaObaveza(){
        $id = $this->input->post('id');
        $this->User_model->setNeaktivnaObaveza($id);
        echo TRUE;
    }

    protected function nav_tab4(){}
    protected function nav_tab5(){}
    protected function nav_tab6(){}
    protected function nav_tab7(){}
    protected function nav_tab8(){}
    
    protected function getPageType() {
        return "User";
    }
}

?>