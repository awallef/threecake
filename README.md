# Three Cake

[![3xw](https://raw.github.com/awallef/threecake/master/plugins/Trois/composer/data/logo/logo.png)](http://www.3xw.ch)

a cakephp start point to use with with [Composer](http://getcomposer.org/).
inspired by [Eatcake](https://github.com/shama/eatcake/)

## Manual Install

* Install Composer with: `curl -s https://getcomposer.org/installer | php`
* Then create a new project with: `php composer.phar create-project awallef/threecake path/ -s"dev"`

## Install the familly 
* [Install nodejs](https://github.com/joyent/node/wiki/Installation)
* [Install ruby/gem](http://docs.rubygems.org/read/chapter/3)
* Install compass: `gem install compass`
* Install grunt `npm install -g grunt-cli`
* Install bower: `npm install bower -g`
* Install dependencies: `npm install && bower install`

## Configure cake PHP
* Change the value of 'Security.salt' in app/Config/core.php 
* Change the value of 'Security.cipherSeed' in app/Config/core.php
* Rename APP/Config/database.php.default to APP/Config/database.php
* Create the basic tables Trois needs `.path/app/Console/cake schema create`

## Usage

Merge this repo into your CakePHP project app folder. The required files in this repo
are: `Gruntfile.js` and `package.json`.

Run `grunt` to compile your scss and js.

Run `grunt prod` to compile your scss and js for production.

Run `grunt watch` to compile your files as you save.

## Updating

Update CakePHP later with: `php composer.phar update` from inside your project directory.

## What?

Threecake loads & installs 3 packages:
[cakephp/cakephp](https://github.com/cakephp/cakephp/) the cakePHP framework
[awallef/trois](https://github.com/awallef/trois/) an admin and mediafile plugin for cakePHP
[awallef/moderncake](https://github.com/awallef/moderncake/) a modern start point for cakePHP using tools such as compass, grunt, twitter/bootstrap etc...


