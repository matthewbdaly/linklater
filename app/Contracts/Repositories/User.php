<?php

namespace LinkLater\Contracts\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface;

interface User extends AbstractRepositoryInterface
{
    public function byId(string $id);
}
