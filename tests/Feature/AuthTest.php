<?php

namespace Tests\Feature;

use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LinkLater\Eloquent\Models\User;

class AuthTest extends BrowserTestCase
{
    /**
     * Test login
     *
     * @return void
     */
    public function testLogin()
    {
        $user = factory(User::class)->create([]);
        $this->visit('/')
            ->click('Login')
            ->type($user->email, 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->seePageIs('/home');
    }
}
