<?php

namespace ByTIC\Assets;

use ByTIC\Assets\Assets\AssetCollection;
use Nip\Utility\Traits\SingletonTrait;

/**
 * Class Assets
 * @package ByTIC\Assets
 *
 * @method AssetCollection styles()
 */
class Assets
{
    use Assets\Traits\HasEntriesTrait;
    use SingletonTrait;

    /**
     * Magic Method for calling methods on the default container.
     *
     * <code>
     *     // Call the "styles" method on the default container
     *     echo Orchestra\Asset::styles();
     *
     *     // Call the "add" method on the default container
     *     Orchestra\Asset::add('jquery', 'js/jquery.js');
     * </code>
     *
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        return call_user_func_array([static::instance()->entry(), $method], $parameters);
    }
}