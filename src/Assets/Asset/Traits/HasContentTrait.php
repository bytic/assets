<?php

namespace ByTIC\Assets\Assets\Asset\Traits;

/**
 * Trait HasContentTrait
 * @package ByTIC\Assets\Assets\Asset\Traits
 */
trait HasContentTrait
{
    protected $content = null;

    /**
     * @return null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return bool
     */
    public function hasContent(): bool
    {
        return $this->content !== null;
    }

    /**
     * @param bool $content
     */
    public function setContent(bool $content): void
    {
        $this->content = $content;
    }

    /**
     * @param string $content
     */
    public function appendContent($content): void
    {
        if (empty($this->content)) {
            $this->content = $content;

            return;
        }
        $this->content .= "\r\n".$content;
    }


    /**
     * @param string $content
     */
    public function prependContent($content): void
    {
        if (empty($this->content)) {
            $this->content = $content;

            return;
        }
        $this->content = $content."\r\n".$this->content;
    }
}
