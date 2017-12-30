<?php

namespace Tests\Unit\Eloquent\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LinkLater\Eloquent\Models\Link;
use LinkLater\Eloquent\Models\User;

class LinkTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateLink()
    {
        $user = factory(User::class)->create();
        $model = new Link;
        $model->link = 'http://example.com';
        $model->user_id = $user->id;
        $model->save();
        $link = Link::first();
        $this->assertEquals('http://example.com', $link->link);
        $this->assertEquals($user->id, $link->user_id);
        $this->assertEquals($user->name, $link->user->name);
    }
}
