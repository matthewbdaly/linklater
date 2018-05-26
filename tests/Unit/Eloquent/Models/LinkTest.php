<?php

namespace Tests\Unit\Eloquent\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LinkLater\Eloquent\Models\Link;
use LinkLater\Eloquent\Models\User;
use Mockery as m;

class LinkTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateLink()
    {
        $user = factory(User::class)->create();
        $model = new Link;
        $model->link = 'http://example.com';
        $model->title = 'Example';
        $model->user_id = $user->id;
        $model->save();
        $link = Link::first();
        $this->assertEquals('http://example.com', $link->link);
        $this->assertEquals($user->id, $link->user_id);
        $this->assertEquals($user->name, $link->user->name);
    }

    public function testScopeForUser()
    {
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $guard = m::mock('Illuminate\Contracts\Auth\Guard');
        $guard->shouldReceive('user')->once()->andReturn($user);
        $link1 = factory(Link::class)->create([
            'user_id' => $user->id
        ]);
        $link2 = factory(Link::class)->create([
            'user_id' => $user2->id
        ]);
        $links = Link::forUser($guard)->get();
        $this->assertCount(1, $links);
    }
}
