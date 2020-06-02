<?php

namespace ByTIC\Assets\Tests;

use ByTIC\Assets\Assets;

/**
 * Class AssetsTests
 * @package ByTIC\Assets\Tests
 */
class AssetsTests extends AbstractTest
{
    public function test_static_call()
    {
        $collection = Assets::styles();
        self::assertInstanceOf(Assets\AssetCollection::class, $collection);
    }
}
