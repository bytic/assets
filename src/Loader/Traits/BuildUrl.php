<?php

namespace ByTIC\Assets\Loader\Traits;

use Nip\Utility\Str;

/**
 * Trait BuildUrl
 * @package ByTIC\Assets\Loader\Traits
 */
trait BuildUrl
{
    /**
     * @param $source
     * @return string
     */
    public function buildURL($source)
    {
        if (Str::startsWith($source, ['http', 'https'])) {
            return $source;
        } else {
            return asset('/stylesheets/' . $source . '.css');
        }
    }
}
