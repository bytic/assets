<?php

namespace ByTIC\Assets\Tests\Assets;

use ByTIC\Assets\Assets\Asset;
use ByTIC\Assets\Tests\AbstractTest;

/**
 * Class AssetTest
 * @package ByTIC\Assets\Tests\Assets
 */
class AssetTest extends AbstractTest
{
    public function test_render_styles()
    {
        $asset = new Asset('test.css', Asset::TYPE_STYLES);

        self::assertSame(
            '<style href="test.css" type="text/css" rel="stylesheet"></style>',
            $asset->output()
        );
    }
}