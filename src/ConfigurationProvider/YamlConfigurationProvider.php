<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace fiefioor\DI\ConfigurationProvider;

use Symfony\Component\Yaml;

/**
 * Description of YamlConfigurationProvider
 *
 * @author fiefioor
 */
class YamlConfigurationProvider extends ConfigurationProvider {

    protected $parsed;
    
    public function __construct($source) {
        parent::__construct($source);
        
        $this->parsed = Yaml\Yaml::parseFile($this->source);
    }
    
    public function getConfiguration() {
        return $this->parsed['services'];
    }

    public function getParameters() {
        return $this->parsed['parameters'];
    }

}
