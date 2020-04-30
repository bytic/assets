<?php

namespace Nip\Assets\AssetsManager;

use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;

/**
 * Trait HasEntrypointLookup
 * @package Nip\Assets\AssetsManager
 */
trait HasEntrypointLookup
{
    protected function getEntrypointLookup(string $entrypointName): EntrypointLookupInterface
    {
        return $this->getContainer()->get('assets.entrypoint_lookup');
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
