<?php

namespace ByTIC\Assets\Encore;

use ByTIC\Config\Config;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookup;

/**
 * Class EntrypointLookupFactory
 * @package ByTIC\Assets\Encore
 */
class EntrypointLookupFactory
{
    protected const ENTRYPOINTS_FILE_NAME = 'entrypoints.json';

    protected static $config = null;
    protected static $builds = null;

    /**
     * @param string $entrypointJsonPath
     * @param CacheItemPoolInterface|null $cache
     * @param string|null $cacheKey
     * @param bool $strictMode
     * @return EntrypointLookup
     */
    public static function create(
        string $entrypointJsonPath,
        CacheItemPoolInterface $cache = null,
        string $cacheKey = null,
        bool $strictMode = true
    ) {
        $entrypointLookup = new EntrypointLookup($entrypointJsonPath, $cache, $cacheKey, $strictMode);

        return $entrypointLookup;
    }

    /**
     * @return array|Config|null
     */
    public static function getBuilds()
    {
        if (self::$builds === null) {
            self::$builds = self::generateBuilds();
        }

        return self::$builds;
    }

    /**
     * @return array|Config
     */
    protected static function generateBuilds()
    {
        $config = static::getAssetsConfig();
        $buildsConfig = static::getBuildsConfig();
        $builds = [
            '_default' => static::create($config['output_path'].'/'.static::ENTRYPOINTS_FILE_NAME),
        ];
        foreach ($buildsConfig as $name => $path) {
            $builds[$name] = static::create($path.'/'.static::ENTRYPOINTS_FILE_NAME);
        }

        return $builds;
    }

    /**
     * @return array|Config
     */
    protected static function getBuildsConfig()
    {
        $config = static::getConfig();
        if ($config->has('assets.builds')) {
            return $config->get('assets.builds');
        }

        return [];
    }

    /**
     * @return array|Config
     */
    protected static function getAssetsConfig()
    {
        $config = static::getConfig();
        if ($config->has('assets')) {
            return $config->get('assets');
        }

        return [];
    }

    /**
     * @return Config
     */
    protected static function getConfig()
    {
        if (static::$config === null) {
            static::setConfig(static::generateConfig());
        }

        return static::$config;
    }

    /**
     * @return Config
     */
    protected static function generateConfig()
    {
        if (function_exists('config')) {
            try {
                return \config();
            } catch (\Exception $e) {
            }
        }

        return new Config();
    }

    /**
     * @param Config|array $config
     */
    public static function setConfig($config)
    {
        if (is_array($config)) {
            $config = new Config($config);
        }
        self::$config = $config;
    }

    public static function reset()
    {
        static::$config = null;
        static::$builds = null;
    }
}
