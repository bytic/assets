<?php

namespace ByTIC\Assets\Tests\Assets\Traits;

use ByTIC\Assets\Assets;
use ByTIC\Assets\Assets\EntryPoint;
use ByTIC\Assets\Tests\AbstractTest;

/**
 * Class HasEntriesTraitTest
 * @package ByTIC\Assets\Tests\Assets\Traits
 */
class HasEntriesTraitTest extends AbstractTest
{
    public function test_entry_static()
    {
        $entry = Assets::entry();
        self::assertInstanceOf(EntryPoint::class, $entry);
    }
}