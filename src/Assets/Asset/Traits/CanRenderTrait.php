<?php

namespace ByTIC\Assets\Assets\Asset\Traits;

use ByTIC\Assets\Assets\Asset\AssetRenderer;

/**
 * Trait CanRenderTrait
 * @package ByTIC\Assets\Assets\Asset\Traits
 */
trait CanRenderTrait
{
    protected $output = null;

    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return void|null
     */
    public function output()
    {
        if ($this->output === null) {
            $this->output = $this->render();
        }

        return $this->output;
    }

    /**
     * @return string
     */
    protected function render()
    {
        return AssetRenderer::for($this);
    }
}
