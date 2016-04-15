<?php

class Test extends StudentPage{

    
    public function test1() {
        $this->load->library('unit_test');
        
        $test = $this->Student_model->getObaveze();
        
        $test_name = 'Test da li su obaveze procitane iz baze kao korektan tip podatka za modul student';
        $this->unit->run($test, 'is_array', $test_name);
    }
    
    public function test2() {
         $this->load->library('unit_test');
        $test1 = true;
        $test = $this->Student_model->getObaveze(1, 'projekat');
        foreach ($test as $value) {
            if($value['Aktivna'] == 1)
                $test1 = false;
            else {
                $test1 = false;
                break;
            }
        }

        $test_name = 'Testiranje da li je odredjena obaveza aktivna za modul student';
        $this->unit->run($test1, 'is_true', $test_name);
    }

   
    public function index(){
        $this->load->library('unit_test');
        
        $this->test1();
        $this->test2();
 
        echo $this->unit->report();
    }
 
                                                                    
    
}
