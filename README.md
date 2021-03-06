# ROMA

utility to work with roma numbers.

[![Build Status](https://travis-ci.org/CodeFrogHub/php-roma.svg?branch=master)](https://travis-ci.org/CodeFrogHub/php-roma)

## FROM PHPUNTI STARTER
### Prerequisite

1. PHP (https://php.net/downloads.php)
2. Composer (https://getcomposer.org/)
3. PHPUnit (https://phpunit.de/)

For command line use, please setup properly for global environment.

### Installation

Install phpunit for project

    composer install

### Folder Structures

```
Project/
    |-- src/    (php source code)
    |-- tests/  (Testing files)
    |-- composer.json   (Composer configuration file)
    |-- phpunit.xml     (PHPUnit configuration file)
```

### Run PHPUnit

Run all testing files in tests/ folder with color highlight

    phpunit tests/ --colors

### Basic PHP Test File

1. Class with `Test` for naming convention.
2. Test Class MUST extends `PHPUnit_Framework_TestCase`
3. Method name starts with `test` or with annotation `/** @test */`

```php
<?php

class ExampleTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function test_feature()
    {
        // arrange

        // act

        // assert
    }
}
```
PHPUnit Assertions (https://phpunit.de/manual/current/en/appendixes.assertions.html)

Visit [PHPUnit Manual](https://phpunit.de/manual/current/en/) for more information.
