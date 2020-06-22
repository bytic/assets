<?php

namespace ByTIC\Assets\AssetsManager;

use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;

/**
 * Trait HasEntrypointLookup
 * @package ByTIC\Assets\AssetsManager
 */
trait HasEntrypointLookup
{
    protected function getEntrypointLookup(string $entrypointName): EntrypointLookupInterface
    {
        return $this->getContainer()->get('assets.entrypoint_lookup')->getEntrypointLookup($entrypointName);
    }

    /**
     * @param string $entrypointName
     * @return bool|false
     */
    public function hasEntrypoint(string $entrypointName)
    {
        try {
            $this->getEntrypointLookup($entrypointName);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }

    public function getWebpackJsFiles(string $entryName, string $entrypointName = '_default'): array
    {
        return $this->getEntrypointLookup($entrypointName)
            ->getJavaScriptFiles($entryName);
    }

    public function getWebpackCssFiles(string $entryName, string $entrypointName = '_default'): array
    {
        return $this->getEntrypointLookup($entrypointName)
            ->getCssFiles($entryName);
    }
}
