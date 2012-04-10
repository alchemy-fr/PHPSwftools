#PHP Swftools

[![Build Status](https://secure.travis-ci.org/alchemy-fr/PHPSwftools.png?branch=master)](http://travis-ci.org/alchemy-fr/PHPSwftools)

PHP Swftools is a tiny lib which help you to use SWFTools http://www.swftools.org/

SWFTools are GPL licensed and are described as "a collection of utilities for
working with Adobe Flash files"

Documentation available at http://php-swftools.readthedocs.org/

##Dependencies :

In order to use PHP SwfTools, you need to install SWFTools. Depending of your
configuration, please follow the instructions at http://wiki.swftools.org/wiki/Installation.

##Main API usage :

```php

<?php

$File = new SwfTools\FlashFile('Animation.swf');

/**
 * Render the animation to a PNG file
 */
$File->render('renderedAnimation.png');

/**
 * List all embedded object found in the animation.
 * Available object types are : Shapes, Fonts, PNGs, JPEGs, Frames, MovieClip
 */
foreach($File->listEmbeddedObjects() as $embeddedObject)
{
    echo sprintf("found an object type %s with id %d\n", $embeddedObject->getType(), $embeddedObject->getId());
}

/**
 * Extract embedded Object #1
 */
$File->extractEmbedded(1, 'Object1.png');

/**
 * Extract the first embedded image found
 */
$File->extractFirstImage('renderedAnimation.jpg');


```

##Using various binaries versions

PHPSwfTools uses ``swfextract`` an ``swfrender`` provided by SWFTools. If you want to
specify the path to the binary you wnat to use, you can add configuration :

```php

<?php

$configuration = new SwfTools\Configuration(
    array(
      'swftextract' => '/usr/local/bin/swfextract',
      'swftrender'  => '/usr/local/bin/swfrender',
    )
);

$File = new SwfTools\FlashFile('Animation.swf', $configuration);

```

##License

PHPSwftools are released under MIT License http://opensource.org/licenses/MIT

See LICENSE file for more information
