<?php

namespace Tests\Unit\Eloquent\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LinkLater\Eloquent\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateUser()
    {
        $user = factory(User::class)->create([
            'email' => 'bob@example.com',
            'name' => 'Bob Smith',
            'password' => 'password'
        ]);
        $user = User::first();
        $this->assertEquals('bob@example.com', $user->email);
        $this->assertEquals('Bob Smith', $user->name);
    }
}
