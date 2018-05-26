<?php

namespace Tests\Unit\Eloquent\Repositories;

use Tests\TestCase;
use LinkLater\Eloquent\Repositories\User;
use Mockery as m;

class UserTest extends TestCase
{
    public function testById()
    {
        $model = m::mock('LinkLater\Eloquent\Models\User');
        $model->shouldReceive('find')->with('foo')->once()->andReturn($model);
        $repo = new User($model);
        $repo->byId('foo');
    }
}
