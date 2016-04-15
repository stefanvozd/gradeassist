<?php

class Test extends DemonstratorPage{
    

    
    
    public function test1() {
        $this->load->library('unit_test');
        
        $test = $this->Demonstrator_model->getObaveze();
            
        $test_name = 'Testiranje da li upit koji vraca obaveze za modul demonstrator vraca zeljeni tip podatka';
        
        $this->unit->run($test, 'is_array', $test_name);
    }
    
    public function test2() {
        $this->load->library('unit_test');
        $test1 = true;
        $test = $this->Demonstrator_model->getNeaktivniPredmeti();
        foreach ($test as $value) {
            if($value['IDOba'] ==2505)
                $test1 = false;
        }

        $test_name = 'Testiranje da li je ID odredjene obaveze korektno procitam iz baze za modul demonstrator';
        $this->unit->run($test1, 'is_true', $test_name);
    }

   
    public function index(){
        $this->load->library('unit_test');
        
        $this->test1();
        $this->test2();
 
        echo $this->unit->report();
    }
 
                                                                    
    
}
