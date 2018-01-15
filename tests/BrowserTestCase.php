<?php

namespace Tests;

use Laravel\BrowserKitTesting\TestCase as BaseTestCase;

class BrowserTestCase extends BaseTestCase
{
    use CreatesApplication;

    public $baseUrl = 'http://localhost';
}
