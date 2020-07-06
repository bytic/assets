<?php

namespace ByTIC\Assets\Assets\Asset;

use ByTIC\Assets\Assets\Asset;
use Nip\Utility\Arr;

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
        $content = $this->asset->getContent();
        $output =
            sprintf(
                $tag,
                $attributes,
                $content
            );

        return $output;
    }

    /**
     * @return string
     */
    protected function tag()
    {
        if ($this->asset->getType() == Asset::TYPE_STYLES && $this->asset->hasContent()) {
            return '<style %s>%s</style>';
        }
        if ($this->asset->getType() == Asset::TYPE_SCRIPTS) {
            return '<script %s>%s</script>';
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
        if (!$this->asset->getType()) {
            return $attributesMap;
        }
        $method = 'prepareAttribs'.ucfirst(strtolower($this->asset->getType()));
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
        unset($attributes['href']);
        $source = $this->asset->getSource();
        if ($source) {
            $attributes = Arr::prepend($attributes, $this->asset->getSource(), 'href');
        }

        return $attributes;
    }

    /**
     * @param array $attributes
     * @return array
     */
    protected function prepareAttribsScripts($attributes)
    {
        unset($attributes['src']);
        $source = $this->asset->getSource();
        if ($source) {
            $attributes = Arr::prepend($attributes, $this->asset->getSource(), 'src');
        }
        return $attributes;
    }
}
