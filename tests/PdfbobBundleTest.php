<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace LocalbrandingDe\PdfbobBundle\Tests;

use LocalbrandingDe\ExtendedProductDetailBundle\ExtendedProductDetailBundle;
use PHPUnit\Framework\TestCase;

class PdfbobBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ExtendedProductDetailBundle();

        $this->assertInstanceOf('Localbranding-de\PdfbobBundle\PdfbobBundle', $bundle);
    }
}
