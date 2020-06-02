<?php

namespace ByTIC\Assets\Assets\Traits;

use ByTIC\Assets\Assets\EntryPoint;

/**
 * Trait HasEntriesTrait
 * @package ByTIC\Assets\Assets\Traits
 */
trait HasEntriesTrait
{
    /**
     * All of the instantiated asset containers.
     *
     * @var array
     */
    protected $entries = [];

    /**
     * @param string $entry
     * @return EntryPoint
     */
    public static function entry(string $entry = '_default')
    {
        return static::instance()->getEntry();
    }

    /**
     * @param string $entry
     * @return EntryPoint
     */
    public function getEntry(string $entry = '_default')
    {

        if (!isset($this->entries[$entry])) {
            $this->entries[$entry] = new EntryPoint();
        }

        return $this->entries[$entry];
    }
}
