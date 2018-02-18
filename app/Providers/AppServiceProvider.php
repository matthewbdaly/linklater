<?php

namespace LinkLater\Providers;

use Illuminate\Support\ServiceProvider;
use LinkLater\Services\Fetcher;
use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('LinkLater\Contracts\Services\Fetcher', function () {
            $guzzle = new GuzzleClient([
                'verify' => false
            ]);
            $client = new Client($guzzle);
            return new Fetcher($client);
        });
        $this->app->singleton('LinkLater\Contracts\Repositories\Link', function () {
            $baseRepo = new \LinkLater\Eloquent\Repositories\Link(new \LinkLater\Eloquent\Models\Link);
            $cachingRepo = new \LinkLater\Eloquent\Repositories\Decorators\Link($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
        $this->app->singleton('LinkLater\Contracts\Repositories\User', function () {
            $baseRepo = new \LinkLater\Eloquent\Repositories\User(new \LinkLater\Eloquent\Models\User);
            $cachingRepo = new \LinkLater\Eloquent\Repositories\Decorators\User($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
    }
}
