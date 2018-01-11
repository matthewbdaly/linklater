<?php

namespace LinkLater\Eloquent\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Base;
use LinkLater\Contracts\Repositories\Link as LinkContract;
use LinkLater\Eloquent\Models\Link as Model;
use Illuminate\Contracts\Auth\Guard;

class Link extends Base implements LinkContract
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function forUser(Guard $auth)
    {
        return $this->model->forUser($auth)->get();
    }
}
