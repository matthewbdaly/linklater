<?php

namespace Tests\Unit\Eloquent\Repositories;

use Tests\TestCase;
use LinkLater\Eloquent\Repositories\Link;
use Mockery as m;

class LinkTest extends TestCase
{
    public function testForUser()
    {
        $guard = m::mock('Illuminate\Contracts\Auth\Guard');
        $model = m::mock('LinkLater\Eloquent\Models\Link');
        $model->shouldReceive('forUser')->with($guard)->once()->andReturn($model);
        $model->shouldReceive('get')->once()->andReturn([]);
        $repo = new Link($model);
        $repo->forUser($guard);
    }
}
