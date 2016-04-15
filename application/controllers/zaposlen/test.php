<?php

class Test extends ZaposlenPage{
    
    public function test1() {
        $this->load->library('unit_test');
        
        $test = $this->Demonstrator_model->getListaDemonstratora();     
        
        $test_name = 'Testiranje pregleda demostratora za modul zaposlen';
        $this->unit->run($test, 'is_array', $test_name);
    }
    
    public function test2() {
        $this->load->library('unit_test');
        $test1 = false;
        $test = $this->Zaposlen_model->getNeaktivneObaveze();
        foreach ($test as $value) {
            if($value['Aktivna'] == 0)
                $test1 = true;
            else {
                $test1 = false;
                break;
            }
        }
        $test_name = 'Test da li su neaktivne obaveze zaista neaktivne za modul zaposlen';
        $this->unit->run($test1, 'is_true', $test_name);
    }
    
    public function test3() {
        $this->load->library('unit_test');
        
        $test = $this->Zaposlen_model->getSveObaveze();

        $test_name = 'Test da li je iz baze na upit vracen odredjen tip podatka za modul zaposlen';
        $this->unit->run($test, 'is_array', $test_name);
    }
    
    
    
    public function test4() {
        $this->load->library('unit_test');
        $test1 = false;
        $test = $this->Zaposlen_model->getObaveze();
        foreach ($test as $value) {
            if($value['Aktivna'] == 1)
                $test1 = true;
            else {
                $test1 = false;
                break;
            }
        }
        $test_name = 'Testiranje da li je odredjena obaveza aktivna za modul zaposlen';
        $this->unit->run($test1, 'is_true', $test_name);
    }

   
    public function index(){
        $this->load->library('unit_test');
        
        $this->test1();
        $this->test2();
        $this->test3();
        $this->test4();
 
        echo $this->unit->report();
    }
 
                                                                    
    
}