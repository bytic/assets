<?php

namespace Nip\Assets\Tests\Encore;

use Nip\Assets\Encore\EntrypointLookupFactory;
use Nip\Assets\Tests\AbstractTest;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookup;

/**
 * Class EntrypointLookupFactoryTest
 * @package Nip\Assets\Tests\Encore
 */
class EntrypointLookupFactoryTest extends AbstractTest
{
    public function test_getBuilds_default()
    {
        EntrypointLookupFactory::setConfig([
            'assets' => [
                'output_path' => TEST_FIXTURE_PATH.'/build/',
            ],
        ]);

        $builds = EntrypointLookupFactory::getBuilds();
        self::assertIsArray($builds);
        self::assertCount(1, $builds);
        self::assertArrayHasKey('_default', $builds);

        $entrypoint = $builds['_default'];
        self::assertInstanceOf(EntrypointLookup::class, $entrypoint);

        $jsFiles = $entrypoint->getJavaScriptFiles('my_entry');
        self::assertSame(['build/file1.js', 'build/file2.js'], $jsFiles);
    }
}
