<?php

namespace Tests\GoldenMaster;

use Tests\GoldenMasterTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends GoldenMasterTestCase
{
    public function testNonAuthPages()
    {
        eval(\Psy\Sh());
        $this->goto('/');
    }
}
