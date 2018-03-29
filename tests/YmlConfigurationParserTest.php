<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tests;

use PHPUnit\Framework\TestCase;
use fiefioor\DI\ConfigurationProvider\YamlConfigurationProvider;


/**
 * Description of YmlConfigurationParserTest
 *
 * @author fiefioor
 */
class YmlConfigurationParserTest extends TestCase{
    
    
    public function testLoadParameters(){
        $provider = new YamlConfigurationProvider(__DIR__.'/services.yml');
        
        $parameters = $provider->getParameters();
        
        $this->assertEquals(13, $parameters['thing1']);
    }
    
    public function testNotExistingFile(){
        $this->expectException(\Symfony\Component\Yaml\Exception\ParseException::class);
        $provider = new YamlConfigurationProvider(__DIR__.'/services123.yml');
    }
    
    public function testLoadConfiguration(){
        $provider = new YamlConfigurationProvider(__DIR__.'/services.yml');
        
        $configuration = $provider->getConfiguration();
        
        $this->service1($configuration);
        $this->service2($configuration);
        $this->service3($configuration);

    }
    
    protected function service1(array $configuration){
        $this->assertArrayHasKey('test.class1', $configuration);
        $this->assertArrayHasKey('className' ,$configuration['test.class1']);
        $this->assertArrayNotHasKey('arguments' ,$configuration['test.class1']);

        $this->assertEquals($configuration['test.class1']['className'], 'tests\classes\exampleClass1');
    }
    
    protected function service2(array $configuration){
        $this->assertArrayHasKey('test.class2', $configuration);
        $this->assertArrayHasKey('className' ,$configuration['test.class2']);
        $this->assertArrayHasKey('arguments' ,$configuration['test.class2']);

        $this->assertEquals($configuration['test.class2']['className'], 'tests\classes\exampleClass2');
        $this->assertArraySubset($configuration['test.class2']['arguments'], ['@test.class1']);
        
    }
    
    protected function service3(array $configuration){
        $this->assertArrayHasKey('test.class3', $configuration);
        $this->assertArrayHasKey('className' ,$configuration['test.class3']);
        $this->assertArrayHasKey('arguments' ,$configuration['test.class3']);

        $this->assertEquals($configuration['test.class3']['className'], 'tests\classes\exampleClass3');
        $this->assertArraySubset($configuration['test.class3']['arguments'], ['#thing1', 'przemek']);
    }

}
