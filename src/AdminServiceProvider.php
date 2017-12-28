<?php

namespace Angkee\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
        /**
     * @var array
     */
    protected $commands = [
        'Angkee\Admin\Console\InstallCommand'
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        if (file_exists($routes = base_path('routes') . '/admin.php')) {
            $this->loadRoutesFrom($routes);
        }

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config' => config_path()], 'laradmin-config');
            $this->publishes([__DIR__.'/../resources/views' => resource_path('views')], 'laradmin-views');
            $this->publishes([__DIR__.'/../resources/assets/laradmin' => public_path('laradmin')], 'laradmin-public');
            $this->publishes([__DIR__.'/../resources/assets/plugins' => public_path('plugins')], 'laradmin-plugins');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadAdminAuthConfig();

        $this->commands($this->commands);
    }

    /**
     * Setup auth configuration.
     *
     * @return void
     */
    protected function loadAdminAuthConfig()
    {
        config(array_dot(config('admin.auth', []), 'auth.'));
    }

}
