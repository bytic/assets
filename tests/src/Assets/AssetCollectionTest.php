<?php

namespace ByTIC\Assets\Tests\Assets;

use ByTIC\Assets\Assets\Asset;
use ByTIC\Assets\Assets\AssetCollection;
use ByTIC\Assets\Tests\AbstractTest;

/**
 * Class AssetCollectionTest
 * @package ByTIC\Assets\Tests\Assets
 */
class AssetCollectionTest extends AbstractTest
{
    public function test_add_withoutName()
    {
        $collection = new AssetCollection();
        $collection->add('test.js');
        $collection->add('test.js');

        self::assertCount(2, $collection);
        $asset = $collection[0];
        self::assertInstanceOf(Asset::class, $asset);
    }
}
