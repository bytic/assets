<?php

namespace Nip\Assets\Tests\AssetsManager;

use Nip\Assets\AssetsManager;
use Nip\Assets\AssetsServiceProvider;
use Nip\Assets\Encore\EntrypointLookupFactory;
use Nip\Assets\Tests\AbstractTest;

/**
 * Class HasTagRendererTest
 * @package Nip\Assets\Tests\AssetsManager
 */
class HasTagRendererTest extends AbstractTest
{
    public function test_renderWebpackScriptTags()
    {
        $manager = $this->generateManager();

        self::assertSame(
            '<script src="build/file1.js" integrity="sha384-Q86c+opr0lBUPWN28BLJFqmLhho+9ZcJpXHorQvX6mYDWJ24RQcdDarXFQYN8HLc"></script><script src="build/file2.js" integrity="sha384-ymG7OyjISWrOpH9jsGvajKMDEOP/mKJq8bHC0XdjQA6P8sg2nu+2RLQxcNNwE/3J"></script>',
            $manager->renderWebpackScriptTags('my_entry'));
    }

    public function test_renderWebpackLinkTags()
    {
        $manager = $this->generateManager();

        self::assertSame(
            '<link rel="stylesheet" href="build/styles.css" integrity="sha384-4g+Zv0iELStVvA4/B27g4TQHUMwZttA5TEojjUyB8Gl5p7sarU4y+VTSGMrNab8n"><link rel="stylesheet" href="build/styles2.css" integrity="sha384-hfZmq9+2oI5Cst4/F4YyS2tJAAYdGz7vqSMP8cJoa8bVOr2kxNRLxSw6P8UZjwUn">',
            $manager->renderWebpackLinkTags('my_entry'));
    }

    /**
     * @return AssetsManager
     */
    protected function generateManager()
    {
        $provider = new AssetsServiceProvider();
        $provider->initContainer();
        $provider->register();

        EntrypointLookupFactory::setConfig([
            'assets' => [
                'output_path' => TEST_FIXTURE_PATH.'/build/',
            ],
        ]);

        return $provider->getContainer()->get('assets.manager');
    }
}
