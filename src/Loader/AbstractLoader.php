<?php

namespace ByTIC\Assets\Loader;

/**
 * Class AbstractLoader
 * @package ByTIC\Assets\Loader
 */
abstract class AbstractLoader
{
    const DEFAULT_COLLECTION = '__DEFAULT__';

    use Traits\HasAssets;
    use Traits\BuildTag;
    use Traits\BuildUrl;
}
