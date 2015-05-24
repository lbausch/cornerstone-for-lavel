<?php

namespace Bausch\LaravelCornerstone;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // helpers
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'helpers.php';

        // macros
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'macros.php';

        // load views
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'cornerstone');

        // load translations
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'cornerstone');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // stub
    }

}
