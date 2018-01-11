<?php

namespace LinkLater\Eloquent\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Base;
use LinkLater\Contracts\Repositories\User as UserContract;
use LinkLater\Eloquent\Models\User as Model;
use Illuminate\Contracts\Auth\Guard;

class User extends Base implements UserContract
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function byId(string $id)
    {
        return $this->model->find($id);
    }
}
