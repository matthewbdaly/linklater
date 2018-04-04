<?php

namespace Tests\Feature;

use Tests\BrowserTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LinkLater\Eloquent\Models\User;

class AuthTest extends BrowserTestCase
{
    use RefreshDatabase;

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
            ->seePageIs('/');
    }

    /**
     * Test registration
     *
     * @return void
     */
    public function testRegistration()
    {
        $this->visit('/')
            ->click('Register')
            ->type('bob@example.com', 'email')
            ->type('Bob Smith', 'name')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/home');
    }

}
