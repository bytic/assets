<?php

namespace ByTIC\Assets\Assets;

use Nip\Collections\Collection;

/**
 * Class AssetCollection
 * @package ByTIC\Assets\Assets
 */
class AssetCollection extends Collection
{
    /**
     * @var string
     */
    protected $type = '';

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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
            $output .= $item->render();
        }
        return $output;
    }

    /**
     * @return string
     */
    public function renderRaw()
    {
        return $this->getInternal()->render();
    }

    /**
     * @return Asset
     */
    protected function getInternal()
    {
        if (!$this->has('_internal')) {
            $asset = $this->newItem(null);
            $this->set('_internal', $asset);
            return $asset;
        }
        return $this->get('_internal');
    }

    /**
     * @param $value
     * @return Asset
     */
    protected function newItem($value)
    {
        $asset = new Asset($value, $this->getType());
        return $asset;
    }
}
