<?php

 
class StudentPage  extends UserPage { 


    protected function getPageType(){
        return "student";
    }

    protected function left() {
         $this->load->view('student/left.php');
    }
    
    protected function nav_tab1() {
        $this->load->view('student/nav_tab1.php');
    }
    
    protected function nav_tab2() {
        $this->load->view('student/nav_tab2.php');
    }
   
    protected function nav_tab3() {
        $this->load->view('student/nav_tab3.php');
    }
    
    protected function nav_tab4() {
        $this->load->view('student/nav_tab4.php');
    }

}   