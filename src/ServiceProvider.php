<?php

namespace Bausch\LaravelCornerstone;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Helpers
        require_once __DIR__.DIRECTORY_SEPARATOR.'helpers.php';

        // Macros
        require_once __DIR__.DIRECTORY_SEPARATOR.'macros.php';

        // Load views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'cornerstone');

        // Load translations
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'cornerstone');

        // Register route
        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Http/routes.php';
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // stub
    }
}
