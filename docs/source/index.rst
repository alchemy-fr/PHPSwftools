PHP SwfTools
============

.. toctree::
   :maxdepth: 2


PHP SwfTools is a lib for manipulating PDF files and SWF files with SWFTools
(http://www.swftools.org/).

This project is released under MIT License.

API
---

API is quite simple : Two objects should be mainly used and cover the needs :
FlashFile and PDFFile. These objects extends \SplFileInfo.

FlashFile
*********

.. code-block:: php

    <?php

    use SwfTools\FlashFile;
    use SwfTools\Configuration;

    $flash = new FlashFile('file.swf');

    /**
     * Renders the flash file with swfrender
     */
    $flash->render('output.jpg');

    /**
     * List all embedded objects
     *
     * Available object types are one EmbeddedObject::TYPE_* constants
     */
    foreach($flash->listEmbeddedObjects() as $embeddedObject)
    {
        $id = $embeddedObject->getId();

        /**
         * Extract an embedded object
         */
        $flash->extractEmbedded($id, sprintf('output%d.jpg', $id));
    }

    /**
     * Extract the first image obecjt found (jpeg or png)
     */
    $flash->extractFirstImage('output.jpg');


PDFFile
*******


.. code-block:: php

    <?php

    use SwfTools\FlashFile;
    use SwfTools\Configuration;





Exceptions
----------



Using Custom Configuration
--------------------------

PHP SwfTools autodetects SWFTools binaries on most \*nix systems with the command
**where**. If you would like to provide your own configuration, you can do it :

.. code-block:: php

    <?php

    use SwfTools\PDFFile;
    use SwfTools\Configuration;

    $PDF = new PDFFile('file.pdf');
    /* Will autodetect pdf2swf location */
    $PDF->toSwf('destination.swf');

    $PDF = new PDFFile('file.pdf', new Configuration('pdf2swf'=>'/my/custom/path/to/pdf2swf'));
    /* Will use /my/custom/path/to/pdf2swf */
    $PDF->toSwf('destination.swf');

