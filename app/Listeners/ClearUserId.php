<?php

namespace LinkLater\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use LinkLater\Events\UserAmended;
use Illuminate\Contracts\Cache\Repository;

class ClearUserId
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserAmended $event)
    {
        $this->cache->tags(get_class($event->model))->forget('user_by_id_'.$event->model->id);
    }
}
