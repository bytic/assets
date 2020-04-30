<?php

namespace ByTIC\Assets\AssetsManager;

use Symfony\WebpackEncoreBundle\Asset\TagRenderer;

/**
 * Trait HasTagRenderer
 * @package ByTIC\Assets\AssetsManager
 */
trait HasTagRenderer
{

    protected function getTagRenderer(): TagRenderer
    {
        return $this->getContainer()->get('assets.tag_renderer');
    }

    /**
     * @param string $entryName
     * @param null $packageName
     * @param string $entrypointName
     * @return string
     */
    public function renderWebpackScriptTags(
        string $entryName,
        $packageName = null,
        string $entrypointName = '_default'
    ): string {
        return $this->getTagRenderer()
            ->renderWebpackScriptTags($entryName, $packageName, $entrypointName);
    }

    public function renderWebpackLinkTags(
        string $entryName,
        string $packageName = null,
        string $entrypointName = '_default'
    ): string {
        return $this->getTagRenderer()
            ->renderWebpackLinkTags($entryName, $packageName, $entrypointName);
    }
}
