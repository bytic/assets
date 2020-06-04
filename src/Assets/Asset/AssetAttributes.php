<?php

namespace ByTIC\Assets\Assets\Asset;

use ByTIC\Assets\Assets\Asset;

/**
 * Class AssetAttributes
 * @package ByTIC\Assets\Assets\Asset
 */
class AssetAttributes
{
    protected static $defaultAttribs = [
        Asset::TYPE_STYLES => [
            'type' => 'text/css',
            'rel' => 'stylesheet',
        ],
        Asset::TYPE_SCRIPTS => [
            'src' => '',
        ],
    ];

    /**
     * @param $type
     * @return string[]
     */
    public static function defaultFor($type)
    {
        if (!isset(static::$defaultAttribs[$type])) {
            return [];
        }
        return static::$defaultAttribs[$type];
    }
}