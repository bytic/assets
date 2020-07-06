<?php

namespace ByTIC\Assets\Assets\Asset;

use ByTIC\Assets\Assets\Asset;
use Nip\Utility\Traits\SingletonTrait;

/**
 * Class AssetSource
 * @package ByTIC\Assets\Assets\Asset
 */
class AssetSource
{
    use SingletonTrait;

    /**
     * @param $source
     * @param $type
     * @return string
     */
    public static function check($source, $type)
    {
        return function () use ($source, $type) {
            return static::instance()->buildSource($source, $type);
        };
    }

    /**
     * @param $source
     * @param $type
     * @return string
     */
    protected function buildSource($source, $type)
    {
        if (empty($source)) {
            return $source;
        }
        if ($this->isFullPath($source)) {
            return $source;
        }
        if ($type === Asset::TYPE_STYLES) {
            return $this->transformSourceWithAsset('/stylesheets/'.$source.'.css');
        }
        if ($type === Asset::TYPE_SCRIPTS) {
            return $this->transformSourceWithAsset('/scripts/'.$source.'.js');
        }

        return $source;
    }

    /**
     * @param $source
     * @return bool
     */
    protected function isFullPath($source)
    {
        if (strpos($source, '.css') !== false) {
            return true;
        }
        if (strpos($source, '.js') !== false) {
            return true;
        }

        return false;
    }

    /**
     * @param $source
     * @return string
     */
    protected function transformSourceWithAsset($source)
    {
        return \asset($source);
    }
}
