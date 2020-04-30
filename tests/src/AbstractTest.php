<?php

namespace Nip\Assets\Tests;

use Nip\Assets\Encore\EntrypointLookupFactory;
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
