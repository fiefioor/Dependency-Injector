<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace fiefioor\DI\ConfigurationProvider;

/**
 *
 * @author fiefioor
 */
abstract class ConfigurationProvider {

    protected $source;
    
    public function __construct($source) {
        $this->source  = $source;
    }
    
    abstract public function getConfiguration();
    
    abstract public function getParameters();
}
