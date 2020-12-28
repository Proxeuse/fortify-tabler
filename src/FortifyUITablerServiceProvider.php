<?php

namespace Proxeuse\FortifyUITabler;

use Illuminate\Support\ServiceProvider;
use Proxeuse\FortifyUITabler\Commands\FortifyUITablerCommand;
use Proxeuse\FortifyUITabler\Commands\FortifyUITablerUpdateCommand;


class FortifyUITablerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Load Routes
            $this->loadRoutesFrom(__DIR__.'/../stubs/routes/web.php');
            // Load Migrations
            $this->loadMigrationsFrom(__DIR__.'/../stubs/database/migrations');

            // Publish files
            $this->publishes([
                __DIR__ . '/../stubs/resources/views' => base_path('resources/views'),
                __DIR__ . '/../stubs/public' => base_path('public'),
                __DIR__ . '/../stubs/resources/lang' => base_path('resources/lang'),
                __DIR__ . '/../stubs/app/Http/Controllers' => base_path('app/Http/Controllers'),
            ], 'tabler-resources');

            // Update all files
            $this->publishes([
                __DIR__ . '/../stubs/resources/views' => base_path('resources/views'),
                __DIR__ . '/../stubs/public' => base_path('public'),
                __DIR__ . '/../stubs/resources/lang' => base_path('resources/lang'),
                __DIR__ . '/../stubs/app/Http/Controllers' => base_path('app/Http/Controllers'),
            ], 'tabler-update-full');

            // Update public files
            $this->publishes([
                __DIR__ . '/../stubs/public' => base_path('public'),
            ], 'tabler-update-public');

            // Update views
            $this->publishes([
                __DIR__ . '/../stubs/resources/views' => base_path('resources/views'),
            ], 'tabler-update-views');

            // Update controllers
            $this->publishes([
                __DIR__ . '/../stubs/app/Http/Controllers' => base_path('app/Http/Controllers'),
            ], 'tabler-update-controllers');

            // Update all files
            $this->publishes([
                __DIR__ . '/../stubs/resources/lang' => base_path('resources/lang'),
            ], 'tabler-update-language');

            $this->commands([
                FortifyUITablerCommand::class,
                FortifyUITablerUpdateCommand::class,
            ]);
        }
    }
}
