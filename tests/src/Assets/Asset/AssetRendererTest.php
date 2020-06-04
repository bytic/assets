<?php

namespace ByTIC\Assets\Tests\Assets\Asset;

use ByTIC\Assets\Assets\Asset;
use ByTIC\Assets\Tests\AbstractTest;

/**
 * Class AssetRendererTest
 * @package ByTIC\Assets\Tests\Assets\Asset
 */
class AssetRendererTest extends AbstractTest
{
    public function test_for_styleLink()
    {
        $asset = new Asset('test.css', Asset::TYPE_STYLES);
        /** @noinspection HtmlUnknownTarget */
        self::assertSame(
            '<link href="test.css" type="text/css" rel="stylesheet" />',
            Asset\AssetRenderer::for($asset)
        );
    }

    public function test_for_styleWithContent()
    {
        $asset = new Asset('', Asset::TYPE_STYLES);
        $asset->setContent('p{color:#fff;}');
        self::assertSame(
            '<style type="text/css" rel="stylesheet">p{color:#fff;}</style>',
            Asset\AssetRenderer::for($asset)
        );
    }

    public function test_for_script()
    {
        $asset = new Asset('test.js', Asset::TYPE_SCRIPTS);
        /** @noinspection HtmlUnknownTarget */
        self::assertSame(
            '<script src="test.js"></script>',
            Asset\AssetRenderer::for($asset)
        );
    }
}
