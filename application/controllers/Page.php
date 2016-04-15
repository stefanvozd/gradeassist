<?php

class Page  extends CI_Controller {
    

     protected $page_title = "My Title";
     

    public function index() {
    $this -> html();
    $this -> header_begin();
    $this -> title();
    $this -> css_js();
    $this -> header_end();
    $this -> body_theme();
    $this -> modals();
    $this -> navigation();
    $this -> tabs_begin();
    $this -> nav_tab1();
    $this -> nav_tab2();
    $this -> nav_tab3();
    $this -> nav_tab4();
    $this -> nav_tab5();
    $this -> nav_tab6();
    $this -> nav_tab7();
    $this -> nav_tab8();
    $this -> tabs_end();
    $this -> nav_user();
    $this -> navigation_end();
    $this -> content();
    $this -> left_begin();
    $this -> left();
    $this -> left_end();
    $this -> main();
    $this -> page_header();
    $this -> title_header();
    //  $this -> date_header();
    $this -> page_header_end();
    // $this -> breadcrumbs();
    $this -> rows();
    $this -> main_end();
    $this -> footer();
    $this -> content_end();
    $this -> jsscripts();
    $this -> body_theme_end();
    $this -> html_end();
    }

    private  function html(){$this->load->view('template/html.php');}
    private  function header_begin(){$this->load->view('template/header_begin.php');}
        protected  function title(){ $data['title'] = $this ->page_title ;$this->load->view('template/title.php',$data);}
        protected  function css_js(){$this->load->view('template/css_js.php');}
    private  function header_end(){$this->load->view('template/header_end.php');}
     protected  function body_theme(){$this->load->view('template/body_theme.php');}
        protected  function modals(){$this->load->view('template/modals.php');}
        private  function navigation(){$this->load->view('template/navigation.php');}
                  private  function tabs_begin(){$this->load->view('template/tabs_begin.php');}
                        protected  function nav_tab1(){$this->load->view('template/nav_tab1.php');}
                        protected  function nav_tab2(){$this->load->view('template/nav_tab2.php');}
                        protected  function nav_tab3(){$this->load->view('template/nav_tab3.php');}
                        protected  function nav_tab4(){$this->load->view('template/nav_tab4.php');}
                        protected  function nav_tab5(){$this->load->view('template/nav_tab5.php');}
                        protected  function nav_tab6(){$this->load->view('template/nav_tab6.php');}
                        protected  function nav_tab7(){$this->load->view('template/nav_tab7.php');}
                        protected  function nav_tab8(){$this->load->view('template/nav_tab8.php');}
                  private  function tabs_end(){$this->load->view('template/tabs_end.php');}
                  protected  function nav_user(){$this->load->view('template/nav_user.php');}
        private function navigation_end(){$this->load->view('template/navigation_end.php');}
        private  function content(){$this->load->view('template/content.php');}
           private  function left_begin(){$this->load->view('template/left_begin.php');}
            protected  function left(){$this->load->view('template/left.php');}
            private  function left_end(){$this->load->view('template/left_end.php');}
            private  function main(){$this->load->view('template/main.php');}
                private  function page_header(){$this->load->view('template/page_header.php');}
                         protected  function title_header(){$data['title'] = $this ->page_title ;$this->load->view('template/title_header.php',$data);}
                         private  function date_header(){$this->load->view('template/date_header.php');}
                private  function page_header_end(){$this->load->view('template/page_header_end.php');}
                private  function breadcrumbs(){$this->load->view('template/breadcrumbs.php');}
                protected  function rows(){$this->load->view('template/rows.php');}
            private function footer(){$this->load->view('template/footer.php');}
            private  function main_end(){$this->load->view('template/main_end.php');}
         private  function content_end(){$this->load->view('template/content_end.php');}
         
     protected  function jsscripts(){$this->load->view('template/jsscripts.php');}
     private  function body_theme_end(){$this->load->view('template/body_theme_end.php');}
private  function html_end(){$this->load->view('template/html_end.php');}

protected function getPageType(){
        return "Template";
    }

    
    protected function setPageTitle($title){
        $this->page_title = $title;
    }
    
     protected function getPageTitle(){
       return  $this->page_title;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */



