<?php

namespace rogeecn\airproxy;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ProxyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('airproxy', \rogeecn\airproxy\Middleware\AirproxyMiddleware::class);

        $this->publishes([__DIR__ . '/Config/airproxy.php' => config_path('airproxy.php')], 'airproxy');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                \rogeecn\airproxy\Commands\Dispatch::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/Config/airproxy.php', 'airproxy');
    }
}
