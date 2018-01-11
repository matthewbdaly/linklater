<?php

namespace LinkLater\Contracts\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface;
use Illuminate\Contracts\Auth\Guard;

interface Link extends AbstractRepositoryInterface
{
    public function forUser(Guard $auth);
}
