<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tests\classes;

/**
 * Description of exampleClass3
 *
 * @author fiefioor
 */
class exampleClass3 {
    //put your code here
    private $thing1;
    private $thing2;
    
    public function __construct($thing1, $thing2) {
        $this->thing1 = $thing1;
        $this->thing2 = $thing2;
    }
    
    function getThing1() {
        return $this->thing1;
    }

    function getThing2() {
        return $this->thing2;
    }

}
