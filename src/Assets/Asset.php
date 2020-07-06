<?php

namespace ByTIC\Assets\Assets;

use ByTIC\Assets\Assets\Asset\AssetAttributes;
use ByTIC\Assets\Assets\Asset\AssetSource;

/**
 * Class Asset
 * @package ByTIC\Assets\Assets
 */
class Asset
{
    use Asset\Traits\CanRenderTrait;
    use Asset\Traits\HasContentTrait;

    const TYPE_STYLES = 'STYLES';
    const TYPE_SCRIPTS = 'SCRIPTS';

    /**
     * @var string
     */
    protected $type;

    protected $source = false;
    protected $attribs = [];

    /**
     * Asset constructor.
     * @param string $source
     * @param string $type
     */
    public function __construct(string $source = '', $type = '')
    {
        $this->source = AssetSource::check($source, $type);
        $this->type = $type;
        $this->attribs = AssetAttributes::defaultFor($type);
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        if ($this->source instanceof \Closure) {
            $this->source = ($this->source)();
        }
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
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
     * @return array
     */
    public function getAttribs(): array
    {
        return $this->attribs;
    }

    /**
     * @param array $attribs
     */
    public function setAttribs(array $attribs): void
    {
        $this->attribs = $attribs;
    }
}
