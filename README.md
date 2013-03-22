# Three Cake

[![3xw](http://www.3xw.ch/img/threecake.png)](http://www.3xw.ch)

a cakephp start point to use with with [Composer](http://getcomposer.org/).
inspired by [Eatcake](https://github.com/shama/eatcake/)

## Manual Install

* Install Composer with: `curl -s https://getcomposer.org/installer | php`
* Then create a new project with: `php composer.phar create-project awallef/threecake path/ -s"dev"`
* Change the value of 'Security.salt' in app/Config/core.php 
* Change the value of 'Security.cipherSeed' in app/Config/core.php
* Rename APP/Config/database.php.default to APP/Config/database.php
* Create the basic tables Trois needs `.path/app/Console/cake schema create`

## Updating

Update CakePHP later with: `php composer.phar update` from inside your project directory.

## What?

This uses the official CakePHP repository (look in the composer.json).
