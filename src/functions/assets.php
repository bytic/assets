<?php

use ByTIC\Container\Container;

/**
 * @param $entryName
 * @param null $packageName
 * @param null $entrypointName
 * @return string
 * @noinspection PhpDocMissingThrowsInspection
 */
function assets_render_scripts_files($entryName, string $packageName = null, string $entrypointName = '_default')
{
    return assets_manager()->renderWebpackScriptTags($entryName, $packageName, $entrypointName);
}

/**
 * @param $entryName
 * @param string $packageName
 * @param string $entrypointName
 * @return string
 * @noinspection PhpDocMissingThrowsInspection
 */
function assets_render_link_files($entryName, string $packageName = null, string $entrypointName = '_default')
{
    return assets_manager()->renderWebpackLinkTags($entryName, $packageName, $entrypointName);
}

/**
 * @return \ByTIC\Assets\AssetsManager
 * @throws Exception
 */
function assets_manager()
{
    $container = function_exists('app') ? app() : Container::getInstance();
    if (!$container) {
        /** @noinspection PhpUnhandledExceptionInspection */
        throw new Exception("No container was found for assets_manager function");
    }

    $manager = $container->get('assets.manager');
    if (!$manager) {
        /** @noinspection PhpUnhandledExceptionInspection */
        throw new Exception("No Assets Manager was found in the container");
    }

    return $manager;
}
