<?php

namespace LinkLater\Eloquent\Repositories\Decorators;

use Matthewbdaly\LaravelRepositories\Repositories\Decorators\BaseDecorator;
use LinkLater\Contracts\Repositories\Link as LinkContract;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Contracts\Auth\Guard;

class Link extends BaseDecorator implements LinkContract
{
    public function __construct(LinkContract $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function forUser(Guard $auth)
    {
        return $this->cache->tags($this->getModel())->remember('foruser_'.$auth->user()->id, 60, function () use ($auth) {
            return $this->repository->forUser($auth);
        });
    }
}
