<?php

namespace ByTIC\Assets\Tests\Assets\Asset\Traits;

use ByTIC\Assets\Assets\Asset;
use ByTIC\Assets\Tests\AbstractTest;

/**
 * Class HasContentTraitTest
 * @package ByTIC\Assets\Tests\Assets\Asset\Traits
 */
class HasContentTraitTest extends AbstractTest
{
    public function test_hasContent()
    {
        $asset = new Asset('', Asset::TYPE_STYLES);
        self::assertFalse($asset->hasContent());
        $asset->setContent('++');
        self::assertTrue($asset->hasContent());
    }

    public function test_appendContent()
    {
        $asset = new Asset('', Asset::TYPE_STYLES);
        self::assertEmpty($asset->getContent());

        $asset->appendContent('1');
        self::assertSame('1', $asset->getContent());

        $asset->appendContent('2');
        self::assertSame('1'."\r\n".'2', $asset->getContent());
    }

    public function test_prependContent()
    {
        $asset = new Asset('', Asset::TYPE_STYLES);
        self::assertEmpty($asset->getContent());

        $asset->prependContent('1');
        self::assertSame('1', $asset->getContent());

        $asset->prependContent('2');
        self::assertSame('2'."\r\n".'1', $asset->getContent());
    }
}
