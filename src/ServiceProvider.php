<?php

namespace Bausch\LaravelCornerstone;

use Bausch\LaravelCornerstone\Providers\ViewComposerServiceProvider;
use View;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // Helpers
        require_once __DIR__.DIRECTORY_SEPARATOR.'helpers.php';

        // Load views
        $this->loadViewsFrom(__DIR__.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'views', 'cornerstone');

        // Load translations
        $this->loadTranslationsFrom(__DIR__.DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.'lang', 'cornerstone');

        // Load routes
        $this->loadRoutesFrom(__DIR__.DIRECTORY_SEPARATOR.'Http'.DIRECTORY_SEPARATOR.'routes.php');

        // View Composer
        View::composer('*', ViewComposerServiceProvider::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // stub
    }
}
