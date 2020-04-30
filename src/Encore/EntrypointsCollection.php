<?php

namespace ByTIC\Assets\Encore;

use Psr\Container\ContainerInterface;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupInterface;

/**
 * Class EntrypointsCollection
 * @package ByTIC\Assets\Encore
 */
class EntrypointsCollection implements ContainerInterface
{
    protected $entries = [];

    /**
     * EntrypointsCollection constructor.
     * @param array $entries
     */
    public function __construct($entries = null)
    {
        $this->entries = $entries;
    }

    /**
     * @inheritDoc
     * @return EntrypointLookupInterface
     */
    public function get($id)
    {
        if (!$this->has($id)) {
            return null;
        }

        return $this->entries[$id];
    }

    /**
     * @inheritDoc
     */
    public function has($id)
    {
        return isset($this->entries[$id]);
    }
}
