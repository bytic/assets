<?php

namespace ByTIC\Assets\Tests\Assets\Asset;

use ByTIC\Assets\Assets\Asset;
use ByTIC\Assets\Assets\Asset\AssetSource;
use ByTIC\Assets\Tests\AbstractTest;

/**
 * Class AssetSourceTest
 * @package ByTIC\Assets\Tests\Assets\Asset
 */
class AssetSourceTest extends AbstractTest
{
    /**
     * @dataProvider data_check
     * @param $source
     * @param $type
     * @param $output
     */
    public function test_check($source, $type, $output)
    {
        $mock = \Mockery::mock(AssetSource::class)->shouldAllowMockingProtectedMethods()->makePartial();
        $mock->shouldReceive('transformSourceWithAsset')->andReturnUsing(function ($argument) {
            return '/assets'.$argument;
        });
        $source = $mock->buildSource($source, $type);
        self::assertSame($output, $source);
    }

    /**
     * @return array[]
     */
    public function data_check()
    {
        return [
            ['test.css', Asset::TYPE_STYLES, 'test.css'],
            ['test', Asset::TYPE_STYLES, '/assets/stylesheets/test.css'],
            ['test', Asset::TYPE_SCRIPTS, '/assets/scripts/test.js'],
        ];
    }
}
