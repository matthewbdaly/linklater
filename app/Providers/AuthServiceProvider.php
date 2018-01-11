<?php

namespace LinkLater\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LinkLater\Auth\CachingUserProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'LinkLater\Model' => 'LinkLater\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::provider('caching', function ($app, array $config) {
            return new CachingUserProvider(
                $app->make('Illuminate\Contracts\Hashing\Hasher'),
                $config['model'],
                $app->make('Illuminate\Contracts\Cache\Repository')
            );
        });
    }
}
