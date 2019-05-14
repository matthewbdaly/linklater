<?php

namespace Tests\GoldenMaster;

use Tests\GoldenMasterTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends GoldenMasterTestCase
{
    use RefreshDatabase;

    /**
     * @dataProvider nonAuthDataProvider
     */
    public function testNonAuthPages($data)
    {
        $this->goto($data)
            ->saveHtml()
            ->assertSnapshotsMatch();
    }

    public function nonAuthDataProvider()
    {
        return [
            ['/'],
            ['/login'],
        ];
    }
}
