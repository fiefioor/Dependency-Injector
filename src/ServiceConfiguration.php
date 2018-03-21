<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace fiefioor\DI;

/**
 * Description of ServiceConfiguration
 *
 * @author fiefioor
 */
class ServiceConfiguration {

    private $id;
    
    private $className;
    
    private $arguments;
    
    public function __construct($id, $className, $arguments = array()) {
        $this->id = $id;
        $this->className = $className;
        $this->arguments = $arguments;
    }
    
    function getId() {
        return $this->id;
    }

    function getClassName() {
        return $this->className;
    }

    function getArguments() {
        return $this->arguments;
    }

}
