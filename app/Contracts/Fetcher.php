<?php

namespace LinkLater\Contracts;

interface Fetcher
{
    public function fetch(string $url);
}
