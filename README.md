#PHP Swftools

[![Build Status](https://secure.travis-ci.org/alchemy-fr/PHPSwftools.png?branch=master)](http://travis-ci.org/alchemy-fr/PHPSwftools)

PHP Swftools is a tiny lib which help you to use SWFTools http://www.swftools.org/

SWFTools are GPL licensed and are described as "a collection of utilities for
working with Adobe Flash files"

Documentation available at http://php-swftools.readthedocs.org/

## Installation

It is recommended to install PHP-Swftools through
[Composer](http://getcomposer.org) :

```json
{
    "require": {
        "swftools/swftools": "~0.1.0"
    }
}
```

##Dependencies :

In order to use PHP SwfTools, you need to install SWFTools. Depending of your
configuration, please follow the instructions at
http://wiki.swftools.org/wiki/Installation.

##Main API usage :

```php
$file = new SwfTools\FlashFile('Animation.swf');

// Render the animation to a PNG file
$file->render('renderedAnimation.png');

// List all embedded object found in the animation.
// Available object types are : Shapes, Fonts, PNGs, JPEGs, Frames, MovieClip
foreach($File->listEmbeddedObjects() as $embeddedObject) {
    echo sprintf("found an object type %s with id %d\n", $embeddedObject->getType(), $embeddedObject->getId());
}

// Extract embedded Object #1
$file->extractEmbedded(1, 'Object1.png');

// Extract the first embedded image found
$file->extractFirstImage('renderedAnimation.jpg');
```

##Setting timeout

PHPSwfTools uses underlying processes to execute commands. You can set a timeout
to prevent these processes to run more than a defined duration.

To disable timeout, set it to `0` (default value).

```php
$configuration = new SwfTools\Configuration(array(
    'timeout' => 0
));

$file = new SwfTools\FlashFile('Animation.swf', $configuration);
```

##Using various binaries versions

PHPSwfTools uses ``swfextract`` an ``swfrender`` provided by SWFTools. If you
want to specify the path to the binary you wnat to use, you can add
configuration :

```php
$configuration = new SwfTools\Configuration(
    array(
      'swftextract' => '/usr/local/bin/swfextract',
      'swftrender'  => '/usr/local/bin/swfrender',
    )
);

$file = new SwfTools\FlashFile('Animation.swf', $configuration);
```

## Silex Service Provider

PHP-Swtools provides a [Silex](http://silex.sensiolabs.org) service provider.
Every option is optional, use them depending of your configuration. By default,
PHP-Swftools will try to find the executable in the environment PATH and timeout
is set to 0 (no timeout).

```php
$app = new Silex\Application();
$app->register(new SwfTools\SwfToolsServiceProvider(), array(
    'swftools.options' => array(
        'pdf2swf'    => '/usr/local/bin/pdf2swf',
        'swfrender'  => '/usr/local/bin/swfrender',
        'swfextract' => '/usr/local/bin/swfextract',
        'timeout'    => 300,
    )
));

$app['swftools.flash-file']
    ->open('file.swf')
    ->render('output.jpg')
    ->close();

$app['swftools.pdf-file']
    ->open('file.pdf')
    ->toSwf('output.swf')
    ->close();
```

##License

PHPSwftools are released under MIT License http://opensource.org/licenses/MIT

See LICENSE file for more information
