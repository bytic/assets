<?php

namespace ByTIC\Assets\Tests;

use ByTIC\Assets\AssetsManager;
use ByTIC\Assets\AssetsServiceProvider;
use ByTIC\Assets\Encore\EntrypointLookupFactory;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupCollection;
use Symfony\WebpackEncoreBundle\Asset\TagRenderer;

/**
 * Class AssetsServiceProviderTest
 * @package ByTIC\Assets\Tests
 */
class AssetsServiceProviderTest extends AbstractTest
{
    public function test_registerManager()
    {
        $provider = $this->generateProvider();

        $tagRenderer = $provider->getContainer()->get('assets.manager');
        self::assertInstanceOf(AssetsManager::class, $tagRenderer);
    }

    public function test_registerTagRenderer()
    {
        $provider = $this->generateProvider();

        $tagRenderer = $provider->getContainer()->get('assets.tag_renderer');
        self::assertInstanceOf(TagRenderer::class, $tagRenderer);
    }

    public function test_registerEntrypointLookupCollection()
    {
        $provider = $this->generateProvider();

        $lookupCollections = $provider->getContainer()->get('assets.entrypoint_lookup');
        self::assertInstanceOf(EntrypointLookupCollection::class, $lookupCollections);
    }

    /**
     * @return AssetsServiceProvider
     */
    protected function generateProvider()
    {
        $provider = new AssetsServiceProvider();
        $provider->initContainer();
        $provider->register();

        EntrypointLookupFactory::setConfig([
            'assets' => [
                'output_path' => TEST_FIXTURE_PATH.'/build/',
            ],
        ]);


        return $provider;
    }
}
