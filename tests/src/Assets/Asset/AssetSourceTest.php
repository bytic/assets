<?php

namespace ByTIC\Assets\Tests\Assets\Asset;

use ByTIC\Assets\Assets\Asset;
use ByTIC\Assets\Assets\Asset\AssetSource;
use ByTIC\Assets\Tests\AbstractTest;
use PHPUnit\Framework\Attributes\DataProvider;

/**
 * Class AssetSourceTest
 * @package ByTIC\Assets\Tests\Assets\Asset
 */
class AssetSourceTest extends AbstractTest
{
    /**
     * @param $source
     * @param $type
     * @param $output
     */
    #[DataProvider('data_check')]
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
    public static function data_check()
    {
        return [
            ['http://test.com/css', Asset::TYPE_STYLES, 'http://test.com/css'],
            ['test.css', Asset::TYPE_STYLES, 'test.css'],
            ['test', Asset::TYPE_STYLES, '/assets/stylesheets/test.css'],
            ['test', Asset::TYPE_SCRIPTS, '/assets/scripts/test.js'],
        ];
    }
}
