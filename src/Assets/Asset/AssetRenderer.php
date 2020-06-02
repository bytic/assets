<?php

namespace ByTIC\Assets\Assets\Asset;

use ByTIC\Assets\Assets\Asset;

/**
 * Class AssetRenderer
 * @package ByTIC\Assets\Assets\Asset
 */
class AssetRenderer
{
    /**
     * @var Asset
     */
    protected $asset;

    /**
     * AssetRenderer constructor.
     * @param Asset $asset
     */
    protected function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }

    /**
     * @param Asset|Asset\Traits\CanRenderTrait $asset
     * @return string
     */
    public static function for(Asset $asset)
    {
        return (new static($asset))->render();
    }

    /**
     * @return string
     */
    protected function render()
    {
        $tag = $this->tag();
        $attributes = $this->attribString();
        $output = sprintf($tag, $attributes);
        return $output;
    }

    /**
     * @return string
     */
    protected function tag()
    {
        if ($this->asset->getType() == Asset::TYPE_STYLES) {
            return '<style %s></style>';
        }
        if ($this->asset->getType() == Asset::TYPE_SCRIPTS) {
            return '<script %s></script>';
        }
        return '<link %s />';
    }

    /**
     * @return string
     */
    protected function attribString()
    {
        $attributesMap = $this->prepareAttribs();

        return implode(' ', array_map(
            function ($key, $value) {
                return sprintf('%s="%s"', $key, htmlentities($value));
            },
            array_keys($attributesMap),
            $attributesMap
        ));
    }

    /**
     * @return array
     */
    protected function prepareAttribs()
    {
        $attributesMap = $this->asset->getAttribs();
        $method = 'prepareAttribs' . ucfirst($this->asset->getType());
        if (method_exists($this, $method)) {
            $attributesMap = $this->{$method}($attributesMap);
        }
        return $attributesMap;
    }

    /**
     * @param array $attributes
     * @return array
     */
    protected function prepareAttribsStyles($attributes)
    {
        $attributes['href'] = $this->asset->getSource();
        return $attributes;
    }

    /**
     * @param array $attributes
     * @return array
     */
    protected function prepareAttribsScripts($attributes)
    {
        $attributes['src'] = $this->asset->getSource();
        return $attributes;
    }
}