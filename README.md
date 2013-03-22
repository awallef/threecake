# Three Cake

a cakephp start point to use with with [Composer](http://getcomposer.org/).
inspired by [Eatcake](https://github.com/shama/eatcake/)

## Manual Install

* Install Composer with: `curl -s https://getcomposer.org/installer | php`
* Then create a new project with: `php composer.phar create-project awallef/threecake path/`

## Updating

Update CakePHP later with: `php composer.phar update` from inside your project directory.

## What?

Using Composer, this will download CakePHP and set it up. The CakePHP core will
be located in the `vendor/cakephp/cakephp/lib/Cake` folder. The included
`index.php` file wil set the `CAKE_CORE_INCLUDE_PATH` to that folder.

This uses the official CakePHP repository (look in the composer.json).
