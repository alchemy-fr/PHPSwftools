<?php

/*
 * This file is part of PHP-SwfTools.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SwfTools\Processor;

use Monolog\Logger;
use Monolog\Handler\NullHandler;
use SwfTools\Exception\Exception;
use SwfTools\Exception\InvalidArgumentException;

/**
 * @author Romain Neutron imprec@gmail.com
 */
class PDFFile extends File
{

    /**
     *
     * @param string $outputFile
     * @param Logger $logger
     *
     * @throws InvalidArgumentException
     */
    public function toSwf($outputFile, Logger $logger = null)
    {
        if ( ! $outputFile) {
            throw new InvalidArgumentException('Bad destination');
        }

        if ( ! $logger) {
            $logger = new Logger('Null logger');
            $logger->pushHandler(new NullHandler());
        }

        $pdf2swf = $this->getBinaryAdapter('Pdf2swf', $logger);

        /* @var $pdf2swf \SwfTools\Binary\Pdf2swf */

        $pdf2swf->toSwf($this->pathfile, $outputFile);
    }

}
