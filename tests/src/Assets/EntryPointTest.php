<?php

namespace ByTIC\Assets\Tests\Assets;

use ByTIC\Assets\Assets\Asset;
use ByTIC\Assets\Assets\AssetCollection;
use ByTIC\Assets\Assets\EntryPoint;
use ByTIC\Assets\AssetsServiceProvider;
use ByTIC\Assets\Encore\EntrypointLookupFactory;
use ByTIC\Assets\Tests\AbstractTest;

/**
 * Class EntryPointTest
 * @package ByTIC\Assets\Tests\Assets
 */
class EntryPointTest extends AbstractTest
{
    public function test_collection_init()
    {
        $entrypoint = new EntryPoint();

        $scripts = $entrypoint->scripts();
        self::assertInstanceOf(AssetCollection::class, $scripts);
        self::assertSame(Asset::TYPE_SCRIPTS, $scripts->getAssetType());
        self::assertSame($scripts, $entrypoint->scripts());

        $styles = $entrypoint->styles();
        self::assertInstanceOf(AssetCollection::class, $styles);
        self::assertSame(Asset::TYPE_STYLES, $styles->getAssetType());
        self::assertSame($styles, $entrypoint->styles());
    }

    public function test_addFromWebpack()
    {
        $provider = new AssetsServiceProvider();
        $provider->initContainer();
        $provider->register();

        EntrypointLookupFactory::setConfig([
            'assets' => [
                'output_path' => TEST_FIXTURE_PATH.'/build/',
            ],
        ]);

        $entrypoint = new EntryPoint();
        $entrypoint->addFromWebpack('my_entry');

        $styles = $entrypoint->styles();
        self::assertCount(2, $styles);

        $scripts = $entrypoint->scripts();
        self::assertCount(2, $scripts);
    }
}
