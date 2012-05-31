<?php

/*
 * This file is part of PHP-SwfTools.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwfTools;

/**
 * @author Romain Neutron imprec@gmail.com
 */
class PDFFile extends File
{

    public function toSwf($outputFile)
    {
        if ( ! $outputFile) {
            throw new Exception\InvalidArgument('Bad destination');
        }

        $pdf2swf = $this->getBinaryAdapter('Pdf2swf');

        /* @var $pdf2swf \SwfTools\Binary\Pdf2swf */

        $pdf2swf->toSwf($this, $outputFile);
    }

}
