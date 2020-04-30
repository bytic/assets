<?php

namespace ByTIC\Assets\Tests;

use ByTIC\Assets\Encore\EntrypointLookupFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest.
 */
abstract class AbstractTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        EntrypointLookupFactory::reset();
    }
}
