#PHP Swftools

[![Build Status](https://secure.travis-ci.org/alchemy-fr/PHPSwftools.png?branch=master)](http://travis-ci.org/alchemy-fr/PHPSwftools)

PHP Swftools is a tiny lib which help you to use SwfTools.


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

