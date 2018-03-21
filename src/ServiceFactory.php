<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace fiefioor\DI;

/**
 * Description of ServiceFactory
 *
 * @author fiefioor
 */
class ServiceFactory {
    
    private $factiories;
    
    public function __construct(array $configuration) {
        $this->factiories = array();
        
        /** @var array $entry */
        foreach($configuration as $id => $entry){
            $this->factiories[$id] = new ServiceConfiguration($id, $entry['className'], $entry['arguments']);
        }
    }
    
    public function createInstance(ServiceConfiguration $configuration){
        
        foreach($configuration->setArguments() as $argument){
            $type = $this->resloveArgument($argument);
        }
        
    }
    
    public function resloveArgument($argument){
  
    }
}
