# Dependency-Injector

Dependency-Injector inspired by Symfony's Services


#Example Usage
```php
$container = new Container(new YamlConfigurationProvider('services.yml'));

$testClass1 = $container->get('test.class1');
```

For now only Yaml config files are processed, PHP and XML files are planned for future