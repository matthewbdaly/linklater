<?php

namespace LinkLater\Eloquent\Repositories\Decorators;

use Matthewbdaly\LaravelRepositories\Repositories\Decorators\BaseDecorator;
use LinkLater\Contracts\Repositories\User as UserContract;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Contracts\Auth\Guard;

class User extends BaseDecorator implements UserContract
{
    public function __construct(UserContract $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function byId(string $id)
    {
        return $this->cache->tags($this->getModel())->remember('user_by_id_'.$id, 60, function () use ($id) {
            return $this->repository->byId($id);
        });
    }
}
