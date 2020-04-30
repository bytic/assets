<?php

namespace ByTIC\Assets;

use Nip\Container\ContainerAwareTrait;

/**
 * Class AssetsManager
 * @package ByTIC\Assets
 */
class AssetsManager
{
    use ContainerAwareTrait;
    use AssetsManager\HasEntrypointLookup;
    use AssetsManager\HasTagRenderer;
}
