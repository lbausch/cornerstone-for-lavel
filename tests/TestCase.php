<?php

namespace Tests;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Get Package Providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Bausch\LaravelCornerstone\ServiceProvider::class,
        ];
    }
}
