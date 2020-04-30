<?php

namespace Nip\Assets;

use Nip\Container\ContainerAwareTrait;

/**
 * Class AssetsManager
 * @package Nip\Assets
 */
class AssetsManager
{
    use ContainerAwareTrait;
    use AssetsManager\HasEntrypointLookup;
    use AssetsManager\HasTagRenderer;
}
