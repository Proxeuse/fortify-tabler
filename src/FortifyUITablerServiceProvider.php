<?php

namespace Proxeuse\FortifyUITabler;

use Illuminate\Support\ServiceProvider;
use Proxeuse\FortifyUITabler\Commands\FortifyUITablerCommand;

class FortifyUITablerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // Load Routes
            $this->loadRoutesFrom(__DIR__.'/../stubs/routes/web.php');
            // Load Migrations
            $this->loadMigrationsFrom(__DIR__.'/../stubs/database/migrations');

            // Publis files
            $this->publishes([
                __DIR__ . '/../stubs/resources/views' => base_path('resources/views'),
                __DIR__ . '/../stubs/public' => base_path('public'),
                __DIR__ . '/../stubs/resources/lang' => base_path('resources/lang'),
                __DIR__ . '/../stubs/app/Http/Controllers' => base_path('app/Http/Controllers'),
            ], 'fortify-ui-tabler-resources');

            $this->commands([
                FortifyUITablerCommand::class,
            ]);
        }
    }
}
