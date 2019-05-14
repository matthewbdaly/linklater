<?php

namespace Tests\GoldenMaster;

use Tests\GoldenMasterTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends GoldenMasterTestCase
{
    /**
        * @dataProvider dataProvider
     */
    public function testNonAuthPages($data)
    {
        $this->goto($data)
            ->saveHtml()
            ->assertSnapshotsMatch();
    }

    public function dataProvider()
    {
        return [
            ['/'],
            ['/login'],
        ];
    }
}
