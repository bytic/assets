<?php

namespace Nip\Assets;

use Nip\Assets\Encore\EntrypointLookupFactory;
use Nip\Assets\Encore\EntrypointsCollection;
use Nip\Container\ServiceProviders\Providers\AbstractSignatureServiceProvider;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\Packages;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupCollection;
use Symfony\WebpackEncoreBundle\Asset\TagRenderer;

/**
 * Class AssetsServiceProvider
 * @package Nip\Assets
 */
class AssetsServiceProvider extends AbstractSignatureServiceProvider
{
    /**
     * @inheritDoc
     */
    public function provides()
    {
        return [
            'assets.manager',
            'assets.packages',
            'assets.tag_renderer',
            'assets.entrypoint_lookup',
        ];
    }

    public function register()
    {
        $this->registerManager();
        $this->registerPackages();
        $this->registerTagRenderer();
        $this->registerEntrypointLookupCollection();
    }

    protected function registerManager()
    {
        $this->getContainer()->share('assets.manager', function () {
            $manager = new AssetsManager();
            $manager->setContainer($this->getContainer());
            return $manager;
        });
    }

    protected function registerPackages()
    {
        $this->getContainer()->share('assets.packages', function () {
            $package = new Package(new EmptyVersionStrategy());
            return new Packages($package);
        });
    }

    protected function registerTagRenderer()
    {
        $this->getContainer()->share('assets.tag_renderer', function () {
            return new TagRenderer(
                $this->getContainer()->get('assets.entrypoint_lookup'),
                $this->getContainer()->get('assets.packages')
            );
        });
    }

    protected function registerEntrypointLookupCollection()
    {
        $this->getContainer()->share('assets.entrypoint_lookup', function () {
            return new EntrypointLookupCollection($this->generateBuildEntrypoints());
        });
    }

    /**
     * @return EntrypointsCollection
     */
    protected function generateBuildEntrypoints()
    {
        $entries = EntrypointLookupFactory::getBuilds();
        return new EntrypointsCollection($entries);
    }
}
