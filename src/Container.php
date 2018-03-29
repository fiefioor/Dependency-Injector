<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace fiefioor\DI;

use Psr\Container\ContainerInterface;

/**
 * Description of Container
 *
 * @author fiefioor
 */
class Container implements ContainerInterface {

    /**
     * contains information about all created instances of classes
     * 
     * @var array $shared 
     */
    private $instances;
    
    /**
     * contains informations about all services configuration
     * 
     * @var ServiceConfiguration[] $configurations
     */
    private $configurations;
    
    /**
     * contains information about parameters
     * 
     * @var type 
     */
    private $parameters;
    
    public function __construct(\fiefioor\DI\ConfigurationProvider\ConfigurationProvider $configurationProvider) {
        $this->instances = array();
        $this->configurations = array();
        $this->parameters = array();

        /** @var array $entry */
        foreach ($configurationProvider->getConfiguration() as $id => $entry) {
            
           if(!array_key_exists('arguments', $entry)){
               $entry['arguments'] = array();
           }
            
            $this->configurations[$id] = new ServiceConfiguration($id, $entry['className'], $entry['arguments']);
        }
        
        foreach ($configurationProvider->getParameters() as $id => $parameter){
            $this->parameters[$id] = $parameter;
        }
    }

    /**
     * 
     * @param type $id
     */
    public function get($id) {

        if(!isset($this->instances[$id])){
            $this->instances[$id] = $this->createInstance($this->configurations[$id]);
        }
                
        return $this->instances[$id];
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function getAsNewInstance($id){
        return $this->createInstance($this->configurations[$id]);
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    protected function getParameter($id){
        return $this->parameters[$id];
    }
    
    /**
     * 
     * @param type $id
     * @return boolean
     */
    public function has($id) {         
        return isset($this->factories[$id]);
    }
    
    /**
     * 
     * @param \fiefioor\DI\ServiceConfiguration $configuration
     * @return type
     */
    protected function createInstance(\fiefioor\DI\ServiceConfiguration $configuration){
        
        $arguments = array();

        foreach ($configuration->getArguments() as $argument) {
            $arguments[] = $this->resloveArgument($argument);
        }
                
        $reflection = new \ReflectionClass($configuration->getClassName());
                
        if (!count($arguments)) {
            $object = $reflection->newInstanceArgs();
        } else {
            $object = $reflection->newInstanceArgs($arguments);
        }
        
        return $object;
    }

    /**
     * 
     * returns what type is given argument
     * 
     * @param type $argument
     * @return string
     */
    protected function resloveArgument($argument){
            
        switch (true) {
            case preg_match("/^@.*$/", $argument): // SERVICE
                return $this->get(str_replace("@","",$argument));
                break;
            case preg_match("/^#.*$/", $argument): // PARAMETER
                return $this->getParameter(str_replace("#","",$argument));
                break;
            default: // VALUE
                return $argument;
                break;
        }
    }

    
}
