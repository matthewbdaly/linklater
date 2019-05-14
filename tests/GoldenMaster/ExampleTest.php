<?php

namespace Tests\GoldenMaster;

use Tests\GoldenMasterTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends GoldenMasterTestCase
{
    use RefreshDatabase;

    /**
     * @dataProvider authDataProvider
     */
    public function testAuthPages($data)
    {
        $this->goto($data)
            ->saveHtml()
            ->assertSnapshotsMatch();
    }

    /**
     * @dataProvider nonAuthDataProvider
     */
    public function testNonAuthPages($data)
    {
        $this->goto($data)
            ->saveHtml()
            ->assertSnapshotsMatch();
    }

    public function authDataProvider()
    {
        return [
            ['/'],
            ['/home'],
        ];
    }

    public function nonAuthDataProvider()
    {
        return [
            ['/register'],
            ['/login'],
        ];
    }
}
