<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace LocalbrandingDe\ExtendedProductDetailBundle\Tests;

use LocalbrandingDe\ExtendedProductDetailBundle\ExtendedProductDetailBundle;
use PHPUnit\Framework\TestCase;

class MembershiplevelsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ExtendedProductDetailBundle();

        $this->assertInstanceOf('Localbranding-de\ExtendedProductDetailBundle\ExtendedProductDetailBundle', $bundle);
    }
}
