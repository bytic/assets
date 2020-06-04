<?php

namespace ByTIC\Assets\Assets;

use Nip\Collections\Typed\ClassCollection;

/**
 * Class AssetCollection
 * @package ByTIC\Assets\Assets
 */
class AssetCollection extends ClassCollection
{
    /**
     * @var string
     */
    protected $validClass = Asset::class;

    protected $assetType = '';

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->ensureItem($value);
        parent::offsetSet($offset, $value);
    }

    /**
     * @inheritDoc
     */
    public function unshift($value, $key = null)
    {
        $this->ensureItem($value);
        parent::unshift($value, $key);
    }

    /**
     * {@inheritDoc}
     */
    public function add($source, $name = null)
    {
        parent::add($this->newItem($source), $name);
    }

    /**
     * @param $content
     */
    public function addRaw($content)
    {
        $this->getInternal()->appendContent($content);
    }

    /**
     * @return string
     */
    public function getAssetType(): string
    {
        return $this->assetType;
    }

    /**
     * @param string $type
     */
    public function setAssetType(string $type): void
    {
        $this->assetType = $type;
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     */
    public function render()
    {
        $output = '';
        $items = $this->all();
        unset($items['_internal']);
        foreach ($items as $item) {
            $output .= $item->output();
        }
        return $output;
    }

    /**
     * @return string
     */
    public function renderRaw()
    {
        return $this->getInternal()->output();
    }

    /**
     * @return Asset
     */
    protected function getInternal()
    {
        if (!$this->has('_internal')) {
            $asset = $this->newItem('');
            $this->set('_internal', $asset);
            return $asset;
        }
        return $this->get('_internal');
    }

    /**
     * @param $value
     */
    protected function ensureItem(&$value)
    {
        if ($value instanceof Asset) {
            return;
        }
        $value = $this->newItem($value);
    }

    /**
     * @param $value
     * @return Asset
     */
    protected function newItem($value)
    {
        return new Asset($value, $this->getAssetType());
    }
}
