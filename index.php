<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 

require 'vendor/autoload.php';

use fiefioor\DI\Container;
use fiefioor\DI\ConfigurationProvider\YamlConfigurationProvider;

$container = new Container(new YamlConfigurationProvider('test/services.yml'));

$object1 = $container->get('test.class1');
var_dump($object1);

$object2 = $container->get('test.class2');
var_dump($object2);

$object3 = $container->get('test.class3');
var_dump($object3);
