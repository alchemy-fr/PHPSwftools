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

##License

PHPSwftools are released under MIT License http://opensource.org/licenses/MIT

See LICENSE file for more information
