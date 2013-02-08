JhuZdtLoggerModule
==================

A ZF2 module to log data using [Zend\Log](http://framework.zend.com/manual/2.1/en/modules/zend.log.overview.html) and write them to [ZendDeveloperTools](https://github.com/zendframework/ZendDeveloperTools) toolbar. If you already have a logger in your application (that is an instance of `Zend\Log\Logger`) it will integrate well with it so you still will only have to use your logger.
___

Installation
============

The easiest way is by using [composer](http://getcomposer.org). Just add `"jhuet/zdt-logger-module": "dev-master"` (or `"jhuet/zdt-logger-module": "0.3"` for last stable version) as a requirement in your `composer.json` file and it will be automatically downloaded next time you do `composer.phar update`.

If you don't use composer, drop the files of [this archive](https://github.com/jhuet/JhuZdtLoggerModule/archive/master.zip) ([0.3 here](https://github.com/jhuet/JhuZdtLoggerModule/archive/0.3.zip)) in your `module` directory.

Then, add `Jhu\ZdtLoggerModule` in the list of activated modules of your `application.config.php` file.

Options
=======

Configuration options are available in [`config/jhu-zdt-logger.global.php.dist`](https://github.com/jhuet/JhuZdtLoggerModule/blob/master/config/jhu-zdt-logger.global.php.dist) file. If you want to change the default ones, copy it in your `config/autoload` directory, remove the `.dist` extension and edit it.

Options available :

* `logger` : This module will by default create a `Zend\Log\Logger` and add a writer to it. If you already have a logger in your application, you can set it here so it will be used instead of creating a new one. The logger you'll set here has to be available thru the service manager.

Usage
===

If you don't already have a logger in your application, you may refere to this one any time you need to via the service manager with the `jhu.zdt_logger` key. Assuming `$sm` is the service maanger, you could call `$sm->get('jhu.zdt_logger')->info('my log');` [to log](http://framework.zend.com/manual/2.1/en/modules/zend.log.overview.html#logging-messages) with the `INFO` priority.

If you already have a logger in your application and you have set it in the [options](#options), you just have to use your regular logger as you normally would and anything logged will be added to the ZendDeveloperTools toolbar.

Picture
=======

![usage example](http://i50.tinypic.com/5zq1i.png)
