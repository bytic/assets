<?php

namespace ByTIC\Assets\Assets;

/**
 * Class EntryPoint
 * @package ByTIC\Assets\Assets
 */
class EntryPoint
{
    protected $collections = [];

    /**
     * @return AssetCollection
     */
    public function styles()
    {
        return $this->collection(Asset::TYPE_STYLES);
    }

    /**
     * @return AssetCollection
     */
    public function scripts()
    {
        return $this->collection(Asset::TYPE_SCRIPTS);
    }

    /**
     * @param $entryName
     * @noinspection PhpDocMissingThrowsInspection
     */
    public function addFromWebpack($entryName, $method = 'prepend')
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        $scripts = assets_manager()->getWebpackJsFiles($entryName);
        foreach ($scripts as $script) {
            $this->scripts()->{$method}($script);
        }

        /** @noinspection PhpUnhandledExceptionInspection */
        $styles = assets_manager()->getWebpackCssFiles($entryName);
        foreach ($styles as $style) {
            $this->styles()->{$method}($style);
        }
    }

    /**
     * @param string $type
     * @return AssetCollection
     */
    public function collection($type)
    {
        if (!isset($this->collections[$type])) {
            $this->initCollection($type);
        }
        return $this->collections[$type];
    }

    /**
     * @param $type
     */
    protected function initCollection($type)
    {
        $collection = new AssetCollection();
        $collection->setAssetType($type);
        $this->collections[$type] = $collection;
    }
}