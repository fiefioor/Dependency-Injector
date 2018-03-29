<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tests;

use PHPUnit\Framework\TestCase;
use fiefioor\DI\ConfigurationProvider\YamlConfigurationProvider;
use fiefioor\DI\Container;

/**
 * Description of ContainerTest
 *
 * @author fiefioor
 */
class ContainerTest extends TestCase {
    
    protected $container;
    
    public function setUp() {
        parent::setUp();
        
        $this->container = new Container(new YamlConfigurationProvider(__DIR__.'/services.yml'));
    }
    
    public function testClass1(){
        $class1 = $this->container->get('test.class1');       
        $this->assertInstanceOf(classes\exampleClass1::class, $class1);
    }
    
    public function testClass2(){
        
        /** @var classes\exampleClass2 $class2 */
        $class2 = $this->container->get('test.class2');       
        $this->assertInstanceOf(classes\exampleClass2::class, $class2);
        $this->assertInstanceOf(classes\exampleClass1::class, $class2->getExampleClass1());
    }
    
    public function testClass3(){
        
        /** @var tests\classes\exampleClass2 $class2 */
        $class3 = $this->container->get('test.class3');       
        $this->assertInstanceOf(classes\exampleClass3::class, $class3);
        $this->assertEquals(13, $class3->getThing1());
        $this->assertEquals('przemek', $class3->getThing2());
    }
}
