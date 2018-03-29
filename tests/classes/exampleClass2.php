<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tests\classes;

/**
 * Description of exampleClass2
 *
 * @author fiefioor
 */
class exampleClass2 {

    private $exampleClass1;
    
    public function __construct(exampleClass1 $exampleClass1) {
        $this->exampleClass1 = $exampleClass1;
    }
    
    public function getExampleClass1(){
        return $this->exampleClass1;
    }
}
