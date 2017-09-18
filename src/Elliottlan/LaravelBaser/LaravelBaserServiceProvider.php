<?php

namespace Elliottlan\LaravelBaser;

use Illuminate\Support\ServiceProvider;

class LaravelBaserServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('baser', function ($app) {
            return new Baser();
        });

        $this->app->bind('Elliottlan\LaravelBaser\Baser', function ($app) {
            return $app['baser'];
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['baser'];
    }
}
