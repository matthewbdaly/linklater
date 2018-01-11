<?php

namespace LinkLater\Contracts\Services;

interface Fetcher
{
    public function fetch(string $url);
}
